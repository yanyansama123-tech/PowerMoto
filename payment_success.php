<?php
global $con;
include("config.php");

if (isset($_GET['user']) && isset($_GET['amount'])) {
    $user = $_GET['user'];
    $amount = $_GET['amount'];
    $coverage_start = $_GET['coverage_start'];
    $coverage_end = $_GET['coverage_end'];
    $payment_for = $_GET['payment_for'];
    $invoice_number = $_GET['invoice_number'];
    
    // Calculate if payment is late
    $due_date = date('Y-m-d', strtotime($coverage_start));
    $payment_date = date('Y-m-d');
    $days_late = 0;
    $status = 'Confirmed';
    $remarks = '';
    
    if (strtotime($payment_date) > strtotime($due_date)) {
        $days_late = floor((strtotime($payment_date) - strtotime($due_date)) / (60 * 60 * 24));
        $status = 'Late';
        $remarks = "Late by " . $days_late . " day(s)";
    }

    $sql = "INSERT INTO payment (uid, amount, payment_date, mode_of_payment, coverage_start, 
    coverage_end, invoice_number, payment_for, remarks, payment_status, days_late) 
    VALUES ('$user', '$amount', NOW(), 'GCash', '$coverage_start', '$coverage_end', 
    '$invoice_number', '$payment_for', '$remarks', '$status', '$days_late')";
    
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location:feature.php?msg=Payment Successful!");
    } else {
        header("Location:feature.php?msg=Payment Failed!");
    }
} else {
    header("Location:feature.php?msg=Invalid Payment Data!");
}
?>
