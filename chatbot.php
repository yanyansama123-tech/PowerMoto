<div class="container">
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                </div>
                <div class="chatbox__content--header">
                    <h5 class="chatbox__heading--header">Chat support</h5>
                    <p class="chatbox__description--header">Hi. Im Moto AI. How can I help you?</p>
                </div>
            </div>
            <div class="chatbox__messages">
                <div></div>
            </div>
            <div class="chatbox__footer">
                <input type="text" placeholder="Write a message...">
                <button class="chatbox__send--footer send__button">Send</button>
            </div>
        </div>
        <div class="chatbox__button">
            <button style="background: none; border: none; padding: 0;">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" fill="#23272f"/>
                    <path d="M34 18C34 15.7909 31.3137 14 28 14H20C16.6863 14 14 15.7909 14 18V26C14 28.2091 16.6863 30 20 30H21V34L27 30H28C31.3137 30 34 28.2091 34 26V18Z" fill="#fff"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<link rel="stylesheet" href="chatbot-deployment/static/style.css">
<script type="text/javascript" src="chatbot-deployment/static/app.js"></script>

<style>
/* Chatbox gray/black theme */
.chatbox__support {
    background: #fff !important;
    border-radius: 18px;
    box-shadow: 0 4px 32px rgba(0,0,0,0.18);
    color: #fff;
}
.chatbox__header {
    background: #181a20 !important;
    border-radius: 18px 18px 0 0;
    color: #fff;
    padding: 1.2rem 1.5rem 1.2rem 1.5rem;
    display: flex;
    align-items: center;
}
.chatbox__image--header svg.bot {
    width: 48px;
    height: 48px;
    margin-right: 1rem;
    fill: #4b5563;
    background: none;
}
.chatbox__heading--header {
    color: #fff;
    font-size: 1.3rem;
    font-weight: 700;
}
.chatbox__description--header {
    color: #d1d5db;
    font-size: 1rem;
    margin: 0;
}
.chatbox__messages {
    background: #fff;
    color: #fff;
    min-height: 180px;
    max-height: 260px;
    overflow-y: auto;
    box-shadow: none;
}
.chatbox__footer {
    background: #181a20;
    border-radius: 0 0 18px 18px;
    padding: 1.2rem 1.5rem;
    display: flex;
    align-items: center;
}
.chatbox__footer input[type="text"] {
    background: #23272f;
    color: #fff;
    border: none;
    border-radius: 2rem;
    padding: 0.7rem 1.2rem;
    flex: 1;
    font-size: 1.1rem;
    margin-right: 1rem;
    outline: none;
}
.chatbox__send--footer {
    background: #111;
    color: #fff;
    border: none;
    border-radius: 2rem;
    padding: 0.7rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    transition: background 0.2s;
}
.chatbox__send--footer:hover {
    background: #333;
}

/* Typing indicator animation */
.typing-indicator {
    display: flex;
    align-items: center;
    padding: 10px 15px;
}

.typing-indicator span {
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: #666;
    display: inline-block;
    margin-right: 5px;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-indicator span:nth-child(1) {
    animation-delay: -0.32s;
}

.typing-indicator span:nth-child(2) {
    animation-delay: -0.16s;
}

@keyframes typing {
    0%, 80%, 100% {
        transform: scale(0.8);
        opacity: 0.5;
    }
    40% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>
