<?php
if (!function_exists('curl_init')) {
    die('cURL is not installed. Check that: <br>
    1. extension=curl is uncommented in php.ini<br>
    2. php_curl.dll exists in C:\xampp\php\ext<br>
    3. You have restarted XAMPP completely');
}

global $con;
include("config.php");

if (isset($_POST['pay'])) {
    $user = $_POST['user'];
    $amount = $_POST['amount'];

    $query=mysqli_query($con,"SELECT * FROM user WHERE uid=$user");
    $row=mysqli_fetch_array($query);

    $queryhouse=mysqli_query($con,"SELECT * FROM property WHERE pid=$row[house_rented]");
    $house=mysqli_fetch_array($queryhouse);

    $queryPay = mysqli_query($con,"SELECT * FROM payment WHERE uid=$user ORDER BY payment_date DESC LIMIT 1");
    $paymentCount=mysqli_num_rows($queryPay);
    $lastPayment = mysqli_fetch_array($queryPay);
    
    // Determine payment period and amount
    $advanceDeposit = 2;
    $payment_for = 'Monthly Rent';
    
    if ($paymentCount == 0) {
        $advanceDeposit = 2; // First payment: 1 month advance + 1 month deposit
        $payment_for = 'Advance Deposit';
        $coverage_start = date('Y-m-d');
    } else {
        $advanceDeposit = 1;
        $coverage_start = date('Y-m-d', strtotime($lastPayment['coverage_end'] . ' +1 day'));
    }
    
    $coverage_end = date('Y-m-d', strtotime($coverage_start . ' +1 month -1 day'));
    $invoice_number = 'INV-' . date('Ymd') . '-' . sprintf('%04d', $user);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'data' => [
                'attributes' => [
                    'send_email_receipt' => true,
                    'show_description' => true,
                    'show_line_items' => true,
                    'cancel_url' => 'http://localhost/PhilipAndAurea/feature.php',
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $amount * 100 * $advanceDeposit,
                            'description' => $payment_for . ' for ' . date('F Y', strtotime($coverage_start)),
                            'quantity' => 1,
                            'name' => $house['title']
                        ]
                    ],
                    'success_url' => 'http://localhost/PhilipAndAurea/payment_success.php?' . http_build_query([
                        'user' => $user,
                        'amount' => $amount * $advanceDeposit,
                        'coverage_start' => $coverage_start,
                        'coverage_end' => $coverage_end,
                        'payment_for' => $payment_for,
                        'invoice_number' => $invoice_number
                    ]),
                    'payment_method_types' => [
                        'card',
                        'gcash',
                        'paymaya'
                    ],
                    'description' => 'Philip and Aurea'
                ]
            ]
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "accept: application/json",
            "authorization: Basic c2tfdGVzdF9uZlI2VnhxSlczMWNZazd5aDE5aUZTVEU6"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $responseData = json_decode($response, true);
        
        if (isset($responseData['data']['attributes']['checkout_url'])) {
            header('Location: ' . $responseData['data']['attributes']['checkout_url']);
        } else {
            echo json_encode(['error' => 'Failed to create a payment link']);
        }
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

