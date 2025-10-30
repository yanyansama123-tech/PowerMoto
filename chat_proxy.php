<?php
// Proxies chat requests to the Flask server to avoid CORS and mixed-origin issues.
header('Content-Type: application/json');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Read raw body
$rawBody = file_get_contents('php://input');
if ($rawBody === false || $rawBody === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Empty request body']);
    exit;
}

// Target Flask endpoint
$flaskUrl = 'http://127.0.0.1:5000/chat';
$projectRoot = __DIR__ . DIRECTORY_SEPARATOR . 'chatbot-deployment';
$pythonExe = $projectRoot . DIRECTORY_SEPARATOR . 'venv' . DIRECTORY_SEPARATOR . 'Scripts' . DIRECTORY_SEPARATOR . 'python.exe';
$localCli = $projectRoot . DIRECTORY_SEPARATOR . 'local_cli.py';

// Retry logic with small backoff
$maxAttempts = 3;
$attempt = 0;
$response = false;
$httpCode = 0;
$curlErr = '';
while ($attempt < $maxAttempts) {
    $attempt++;
    $ch = curl_init($flaskUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rawBody);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($rawBody)
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErr = curl_error($ch);
    curl_close($ch);

    if ($response !== false && $httpCode > 0) {
        break;
    }

    usleep(250000); // 250ms backoff
}

if ($response === false) {
    // Fallback to local CLI (offline model)
    if (is_file($pythonExe) && is_file($localCli)) {
        $payload = json_decode($rawBody, true);
        $message = isset($payload['message']) ? $payload['message'] : '';
        if ($message !== '') {
            $cmd = '"' . $pythonExe . '" ' . '"' . $localCli . '" ' . escapeshellarg($message);
            $descriptorSpec = [
                0 => ["pipe", "r"],
                1 => ["pipe", "w"],
                2 => ["pipe", "w"]
            ];
            $process = proc_open($cmd, $descriptorSpec, $pipes, $projectRoot);
            if (is_resource($process)) {
                fclose($pipes[0]);
                $output = stream_get_contents($pipes[1]);
                $errOut = stream_get_contents($pipes[2]);
                fclose($pipes[1]);
                fclose($pipes[2]);
                $status = proc_close($process);
                if ($status === 0 && trim($output) !== '') {
                    http_response_code(200);
                    echo json_encode(['response' => trim($output)]);
                    exit;
                }
            }
        }
    }
    
    // Final fallback with basic responses
    $payload = json_decode($rawBody, true);
    $message = isset($payload['message']) ? strtolower(trim($payload['message'])) : '';
    
    $fallbackResponses = [
        'hello' => 'Hello! Welcome to PowerMoto. How can I help you find your perfect property today?',
        'hi' => 'Hi there! I\'m here to help you with property listings and room rentals. What can I do for you?',
        'help' => 'I can help you find properties, answer questions about rentals, and assist with bookings. What would you like to know?',
        'property' => 'We have various properties available for rent and sale. What type of property are you looking for?',
        'room' => 'Great! We have rooms available for rent. What\'s your budget and preferred location?',
        'price' => 'Our properties range in price. Could you tell me your budget so I can suggest suitable options?',
        'contact' => 'You can contact us through our website or visit our office. How else can I help you?'
    ];
    
    $response = 'I\'m here to help you with property listings and rentals. Could you tell me more about what you\'re looking for?';
    
    foreach ($fallbackResponses as $keyword => $fallbackResponse) {
        if (strpos($message, $keyword) !== false) {
            $response = $fallbackResponse;
            break;
        }
    }
    
    http_response_code(200);
    echo json_encode(['response' => $response]);
    exit;
}

http_response_code($httpCode > 0 ? $httpCode : 200);
echo $response;


