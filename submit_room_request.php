<?php
session_start();
include("config.php");

if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $property_id = $_POST['property_id'];
    $desired_start_date = $_POST['desired_start_date'];
    $message = $_POST['message'];

    // Check if user already has a pending request for this property
    $check_query = "SELECT * FROM room_requests 
                   WHERE user_id = ? AND property_id = ? AND status = 'Pending'";
    $stmt = $con->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $property_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['request_error'] = "You already have a pending request for this room.";
        header("location: propertydetail.php?pid=" . $property_id);
        exit();
    }

    // Check if property is still available
    $check_property = "SELECT status FROM property WHERE pid = ? AND status = 'available'";
    $stmt = $con->prepare($check_property);
    $stmt->bind_param("i", $property_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['request_error'] = "This room is no longer available.";
        header("location: propertydetail.php?pid=" . $property_id);
        exit();
    }

    // Insert the request
    $insert_query = "INSERT INTO room_requests (user_id, property_id, desired_start_date, message) 
                    VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param("iiss", $user_id, $property_id, $desired_start_date, $message);

    if ($stmt->execute()) {
        $_SESSION['request_success'] = "Your room request has been submitted successfully!";
    } else {
        $_SESSION['request_error'] = "Error submitting request. Please try again.";
    }

    header("location: propertydetail.php?pid=" . $property_id);
    exit();
}
?> 