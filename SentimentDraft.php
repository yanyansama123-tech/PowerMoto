<?php
session_start();
require("config.php");
require 'vendor/autoload.php'; 

use GuzzleHttp\Client;

$client = new Client();
$endpoint = 'https://api.mymemory.translated.net/get';

$uid = $_SESSION['uid'];
$original_text = $_POST['content'];

try {
    // Translate from Tagalog to English
    $response = $client->get($endpoint, [
        'query' => [
            'q' => $original_text,
            'langpair' => 'tl|en', 
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    if (isset($data['responseData']['translatedText'])) {
        $translated_text = $data['responseData']['translatedText'];
    } else {
        $translated_text = $original_text; // fallback if translation fails
    }

    // --- Execute Python script robustly and capture output (with debug logging) ---
    $venvPy = __DIR__ . DIRECTORY_SEPARATOR . 'chatbot-deployment' . DIRECTORY_SEPARATOR . 'venv' . DIRECTORY_SEPARATOR . 'Scripts' . DIRECTORY_SEPARATOR . 'python.exe';
    $pythonPath = 'C:\Users\acer\AppData\Local\Programs\Python\Python312\python.exe';
    $commands = [
        '"' . $pythonPath . '" -u sentiment_analysis.py',
        '"' . $venvPy . '" -u sentiment_analysis.py',
        'py -3 -u sentiment_analysis.py',
        'python -u sentiment_analysis.py',
        'python3 -u sentiment_analysis.py',
        'py -3 sentiment_analysis.py',
        'python sentiment_analysis.py',
        'python3 sentiment_analysis.py'
    ];

    $output = '';
    $stdoutOnly = '';
    $lastLine = '';
    $logfile = __DIR__ . '/debug_log.txt';

    // Log translation info
    file_put_contents($logfile, "==== NEW FEEDBACK ANALYSIS ====\n", FILE_APPEND);
    file_put_contents($logfile, "Original Text (Tagalog): $original_text\n", FILE_APPEND);
    file_put_contents($logfile, "Translated Text (English): $translated_text\n", FILE_APPEND);

    foreach ($commands as $cmd) {
        $descriptors = [
            0 => ['pipe', 'r'], // stdin
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w'], // stderr
        ];

        file_put_contents($logfile, "Trying command: $cmd\n", FILE_APPEND);
        $process = proc_open($cmd, $descriptors, $pipes, __DIR__);

        if (is_resource($process)) {
            $payload = json_encode([
                'original' => (string)$original_text,
                'translated' => (string)$translated_text,
                'text' => (string)$translated_text
            ], JSON_UNESCAPED_UNICODE);
            file_put_contents($logfile, "Payload to Python: " . $payload . "\n", FILE_APPEND);
            fwrite($pipes[0], $payload);
            fclose($pipes[0]);

            $stdout = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            $status = proc_close($process);

            $stdoutOnly = trim((string)$stdout);
            $output = trim($stdoutOnly . "\n" . (string)$stderr);
            file_put_contents($logfile, "STDOUT:\n" . $stdoutOnly . "\n", FILE_APPEND);
            if (!empty($stderr)) {
                file_put_contents($logfile, "STDERR:\n" . $stderr . "\n", FILE_APPEND);
            }

            if ($status === 0 && !empty(trim($stdout))) {
                file_put_contents($logfile, "Command succeeded.\n", FILE_APPEND);
                break;
            } else {
                file_put_contents($logfile, "Command failed with status $status\n", FILE_APPEND);
            }
        } else {
            file_put_contents($logfile, "Failed to open process for $cmd\n", FILE_APPEND);
        }
    }

    // Try JSON first from STDOUT only
    $json = json_decode($stdoutOnly, true);
    $sentiment = 'Unknown';
    $score = null;
    if (is_array($json) && isset($json['label'])) {
        $sentiment = ucfirst(strtolower(trim((string)$json['label'])));
        if (isset($json['score'])) { $score = (float)$json['score']; }
        file_put_contents($logfile, "JSON parsed: label=$sentiment score=" . ($score ?? 'null') . "\n", FILE_APPEND);
    } else {
        // Fallback to last non-empty line parsing from STDOUT only
        $cleanStdout = preg_replace('/[^\P{C}\n]+/u', '', (string)$stdoutOnly);
        $lines = array_filter(array_map('trim', explode("\n", $cleanStdout)));
        $lastLine = end($lines);
        $sentiment = ucfirst(strtolower(trim((string)$lastLine)));
        file_put_contents($logfile, "Fallback parsed sentiment: $sentiment\n", FILE_APPEND);
    }

    // If still unknown or empty (Python unavailable), compute sentiment in PHP as a final fallback
    if ($sentiment === 'Unknown' || $sentiment === '') {
        file_put_contents($logfile, "Using PHP fallback sentiment analyzer.\n", FILE_APPEND);
        $phpSentiment = (function(string $text): string {
            $t = strtolower($text);
            $positives = [
                // English
                'love','great','amazing','excellent','happy','satisfied','awesome','good','nice','cool','accommodating','thank you','thanks','perfect','wonderful','fantastic','beautiful','best','superb','outstanding','brilliant',
                // Tagalog common positives - expanded list
                'mahal','maganda','napakaganda','masaya','salamat','ayos','okay','okey','galing','astig',
                'napakagaling','napakabuti','napakasarap','napakalinis','napakagandang','napakamaganda',
                'sobrang ganda','sobrang sarap','sobrang galing','sobrang ayos','sobrang maganda','sobrang masaya',
                'napakamasarap','napakabango','napakalinis','napakatamis','napakabait','napakasaya','napakaganda',
                'napakamaganda','napakagaling','napakabuti','napakasarap','napakalinis','napakagandang',
                'magaling','mabuti','masarap','malinis','matamis','mabait','masaya','maganda','mahal',
                'gandang','sarap','linis','tamis','bait','saya','ganda','hal','ok','oks','sige','tama',
                'tumpak','tunay','totoo','tama nga','oo nga','tama ka','tumpak ka','tunay nga','totoo nga'
            ];
            $negatives = [
                // English
                'bad','terrible','awful','hate','angry','disappointed','poor','worst','issue','problem','dirty','smelly','horrible','disgusting','disgusted','frustrated','annoyed','upset','sad','depressed','worried','concerned',
                // Tagalog common negatives - expanded list
                'pangit','panget','galit','malungkot','sama','ayaw','hindi maganda','walang kwenta','problema','masama',
                'napakasama','napakapangit','napakamalungkot','napakagalit','napakabaho','napakadumi','napakamahal',
                'napakabagal','napakainit','napakalamig','napakataas','napakababa','napakalayo','napakalapit',
                'sobrang sama','sobrang pangit','sobrang malungkot','sobrang galit','sobrang baho','sobrang dumi',
                'sobrang mahal','sobrang bagal','sobrang init','sobrang lamig','sobrang taas','sobrang baba',
                'hindi maganda','hindi masarap','hindi malinis','hindi matamis','hindi mabait','hindi masaya',
                'hindi magaling','hindi mabuti','hindi masarap','hindi malinis','hindi matamis','hindi mabait',
                'walang kwenta','walang silbi','walang saysay','walang halaga','walang gana','walang interes',
                'nakakainis','nakakabagot','nakakalungkot','nakakagalit','nakakainip','nakakabwisit',
                'ayoko','ayaw ko','hindi ko gusto','hindi ko nais','hindi ko kailangan','hindi ko kailangan',
                'bastos','walang modo','walang respeto','walang pakundangan','walang hiya','walang awa',
                'mahirap','napakahirap','sobrang hirap','napakabigat','napakabigat','napakamabigat',
                'nakakalungkot','nakakabagot','nakakainis','nakakagalit','nakakainip','nakakabwisit'
            ];
            $negations = ['not','no','never','hindi','wala','walang','ayaw','ayoko'];
            $intensifiers = ['very','so','really','napaka','sobrang','super','napakaganda','napakamaganda','napakagaling','napakabuti','napakasarap','napakalinis','napakatamis','napakabait','napakasaya','napakasama','napakapangit','napakamalungkot','napakagalit','napakabaho','napakadumi','napakamahal','napakabagal','napakahirap'];

            // Tokenize simply on non-letters
            $words = preg_split('/[^a-zñáéíóúü]+/u', $t, -1, PREG_SPLIT_NO_EMPTY);
            if (!$words) return 'Neutral';

            $score = 0.0;
            $window = 3; // lookback window for negation/intensifier
            $count = count($words);
            for ($i = 0; $i < $count; $i++) {
                $w = $words[$i];
                $val = 0.0;
                if (in_array($w, $positives, true)) $val += 1.0;
                if (in_array($w, $negatives, true)) $val -= 1.0;
                if ($val === 0.0) continue;

                // Check modifiers in a small window before the word
                $negate = false; $boost = 1.0;
                for ($j = max(0, $i - $window); $j < $i; $j++) {
                    $p = $words[$j];
                    if (in_array($p, $negations, true)) $negate = !$negate;
                    if (in_array($p, $intensifiers, true)) $boost += 1.0; // Increased boost for Tagalog intensifiers
                }
                if ($negate) $val *= -1.0;
                $score += $val * $boost;
            }

            // More sensitive thresholds for Tagalog
            if ($score >= 0.2) return 'Positive';
            if ($score <= -0.2) return 'Negative';
            return 'Neutral';
        })($translated_text);
        $sentiment = $phpSentiment;
        file_put_contents($logfile, "PHP fallback result: $sentiment\n", FILE_APPEND);
    }

    // Validate sentiment
    if (!in_array($sentiment, ['Positive', 'Negative', 'Neutral'])) {
        file_put_contents($logfile, "Invalid sentiment detected: '$sentiment'. Setting to 'Neutral'.\n\n", FILE_APPEND);
        $sentiment = 'Neutral';
    } else {
        file_put_contents($logfile, "✅ Final Sentiment: $sentiment" . ($score !== null ? " (score=$score)" : "") . "\n\n", FILE_APPEND);
    }

    // --- Insert feedback into database ---
    if (!empty($original_text)) {
        $stmt = mysqli_prepare($con, "INSERT INTO feedback (uid, fdescription, status, sentiment) VALUES (?, ?, '0', ?)");
        mysqli_stmt_bind_param($stmt, "sss", $uid, $original_text, $sentiment);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $scoreText = $score !== null ? " (score=$score)" : "";
            $msg = urlencode("<p class='alert alert-success'>Feedback Sent Successfully </p>");
            header("Location: profile.php?message=$msg");
        } else {
            $error = urlencode("<p class='alert alert-warning'>Feedback Not Sent Successfully: " . mysqli_error($con) . "</p>");
            header("Location: profile.php?error=$error");
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = urlencode("<p class='alert alert-warning'>Please Fill all the fields</p>");
        header("Location: profile.php?error=$error");
    }

} catch (Exception $e) {
    file_put_contents(__DIR__ . '/debug_log.txt', "Exception: " . $e->getMessage() . "\n", FILE_APPEND);
    $error = urlencode("<p class='alert alert-danger'>Error: " . $e->getMessage() . "</p>");
    header("Location: profile.php?error=$error");
}
?>
