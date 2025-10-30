import nltk
import sys
import json
from nltk.sentiment import SentimentIntensityAnalyzer

# Download lexicon quietly
nltk.download('vader_lexicon', quiet=True)

# Initialize analyzer
sia = SentimentIntensityAnalyzer()

"""Read JSON payload from stdin if possible; fallback to argv or raw stdin text."""
raw = None
try:
    raw = sys.stdin.read()
except Exception:
    raw = None

text = ""
if raw:
    raw = raw.strip()
    try:
        payload = json.loads(raw)
        if isinstance(payload, dict):
            text = str(payload.get("text") or payload.get("translated") or payload.get("original") or "").strip()
    except Exception:
        # not JSON, treat as raw text
        text = raw
elif len(sys.argv) > 1 and sys.argv[1].strip() != "":
    text = sys.argv[1].strip()

if not text:
    print(json.dumps({"label": "Neutral", "score": 0.0}), flush=True)
    sys.exit(0)

# Analyze sentiment
scores = sia.polarity_scores(text)
compound = scores.get('compound', 0.0)
pos = scores.get('pos', 0.0)
neg = scores.get('neg', 0.0)
neu = scores.get('neu', 0.0)

# Boost rules for Tagalog/English keywords that VADER may miss.
lower_text = text.lower()
positive_boost_terms = [
    # English
    "love", "great", "amazing", "excellent", "happy", "satisfied", "awesome", "good", "thanks", "thank you", "perfect", "wonderful", "fantastic", "beautiful", "nice", "cool", "best", "superb", "outstanding", "brilliant",
    # Tagalog common positives - expanded list
    "mahal", "maganda", "napakaganda", "masaya", "salamat", "ayos", "okay", "okey", "galing", "astig", 
    "napakagaling", "napakabuti", "napakasarap", "napakalinis", "napakagandang", "napakamaganda", 
    "sobrang ganda", "sobrang sarap", "sobrang galing", "sobrang ayos", "sobrang maganda", "sobrang masaya",
    "napakamasarap", "napakabango", "napakalinis", "napakatamis", "napakabait", "napakasaya", "napakaganda",
    "napakamaganda", "napakagaling", "napakabuti", "napakasarap", "napakalinis", "napakagandang",
    "magaling", "mabuti", "masarap", "malinis", "matamis", "mabait", "masaya", "maganda", "mahal",
    "gandang", "sarap", "linis", "tamis", "bait", "saya", "ganda", "hal", "ok", "oks", "sige", "tama",
    "tumpak", "tunay", "totoo", "tama nga", "oo nga", "tama ka", "tumpak ka", "tunay nga", "totoo nga"
]
negative_boost_terms = [
    # English
    "bad", "terrible", "awful", "hate", "angry", "disappointed", "poor", "worst", "issue", "problem", "horrible", "disgusting", "disgusted", "frustrated", "annoyed", "upset", "sad", "depressed", "worried", "concerned",
    # Tagalog common negatives - expanded list
    "pangit", "panget", "galit", "malungkot", "sama", "ayaw", "hindi maganda", "walang kwenta", "problema", "masama",
    "napakasama", "napakapangit", "napakamalungkot", "napakagalit", "napakabaho", "napakadumi", "napakamahal",
    "napakabagal", "napakainit", "napakalamig", "napakataas", "napakababa", "napakalayo", "napakalapit",
    "sobrang sama", "sobrang pangit", "sobrang malungkot", "sobrang galit", "sobrang baho", "sobrang dumi",
    "sobrang mahal", "sobrang bagal", "sobrang init", "sobrang lamig", "sobrang taas", "sobrang baba",
    "hindi maganda", "hindi masarap", "hindi malinis", "hindi matamis", "hindi mabait", "hindi masaya",
    "hindi magaling", "hindi mabuti", "hindi masarap", "hindi malinis", "hindi matamis", "hindi mabait",
    "walang kwenta", "walang silbi", "walang saysay", "walang halaga", "walang gana", "walang interes",
    "nakakainis", "nakakabagot", "nakakalungkot", "nakakagalit", "nakakainip", "nakakabwisit",
    "ayoko", "ayaw ko", "hindi ko gusto", "hindi ko nais", "hindi ko kailangan", "hindi ko kailangan",
    "bastos", "walang modo", "walang respeto", "walang pakundangan", "walang hiya", "walang awa",
    "mahirap", "napakahirap", "sobrang hirap", "napakabigat", "napakabigat", "napakamabigat",
    "nakakalungkot", "nakakabagot", "nakakainis", "nakakagalit", "nakakainip", "nakakabwisit"
]

# Enhanced Tagalog sentiment detection
for term in positive_boost_terms:
    if term in lower_text:
        # Give higher boost for Tagalog intensifiers
        if any(intensifier in lower_text for intensifier in ["napaka", "sobrang", "super", "napakaganda", "napakamaganda", "napakagaling", "napakabuti", "napakasarap", "napakalinis", "napakatamis", "napakabait", "napakasaya"]):
            compound += 0.25  # Higher boost for intensifiers
        else:
            compound += 0.15  # Standard boost

for term in negative_boost_terms:
    if term in lower_text:
        # Give higher boost for Tagalog intensifiers
        if any(intensifier in lower_text for intensifier in ["napaka", "sobrang", "super", "napakasama", "napakapangit", "napakamalungkot", "napakagalit", "napakabaho", "napakadumi", "napakamahal", "napakabagal", "napakahirap"]):
            compound -= 0.25  # Higher boost for intensifiers
        else:
            compound -= 0.15  # Standard boost

# Handle Tagalog negations more effectively
tagalog_negations = ["hindi", "wala", "walang", "ayaw", "ayoko"]
for negation in tagalog_negations:
    if negation in lower_text:
        # If negation is found, reverse the sentiment slightly
        if compound > 0:
            compound -= 0.1
        elif compound < 0:
            compound += 0.1

# Clamp compound to valid range
if compound > 1.0:
    compound = 1.0
if compound < -1.0:
    compound = -1.0

# More sensitive thresholds for short translated texts
if compound >= 0.01:
    label = "Positive"
elif compound <= -0.01:
    label = "Negative"
else:
    # fallback using pos-neg margin
    margin = pos - neg
    if margin >= 0.05:
        label = "Positive"
    elif margin <= -0.05:
        label = "Negative"
    else:
        label = "Neutral"

# Debug info to STDERR (won't affect JSON on STDOUT)
try:
    sys.stderr.write(
        f"DEBUG: text='{text[:200]}'\n"
        f"scores={{'compound': {compound}, 'pos': {pos}, 'neu': {neu}, 'neg': {neg}}}\n"
        f"label={label}\n"
    )
    sys.stderr.flush()
except Exception:
    pass

print(json.dumps({
    "label": label,
    "score": compound,
    "pos": pos,
    "neu": neu,
    "neg": neg
}), flush=True)
