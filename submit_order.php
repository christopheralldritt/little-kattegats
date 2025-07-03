<?php
// filepath: c:\temp\VSCODE\HTML\HW3\submit_order.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $appetizer = htmlspecialchars($_POST['appetizer']);
    $entree = htmlspecialchars($_POST['entree']);
    $dessert = htmlspecialchars($_POST['dessert']);
    $drink = htmlspecialchars($_POST['drink']);
    $paymentMethod = htmlspecialchars($_POST['payment-method']);
    $specialInstructions = htmlspecialchars($_POST['special-instructions']);

    // Prepare the data to write to the file
    $orderData = "Customer Order:\n";
    $orderData .= "Name: $name\n";
    $orderData .= "Email: $email\n";
    $orderData .= "Phone: $phone\n";
    $orderData .= "Appetizer: $appetizer\n";
    $orderData .= "Entree: $entree\n";
    $orderData .= "Dessert: $dessert\n";
    $orderData .= "Drink: $drink\n";
    $orderData .= "Payment Method: $paymentMethod\n";
    $orderData .= "Special Instructions: $specialInstructions\n";
    $orderData .= "-----------------------------\n";

    // Define the file path
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . "orders.txt";

    // Write the data to the file
    if (file_put_contents($filePath, $orderData, FILE_APPEND)) {
        echo "Order submitted successfully!";
    } else {
        echo "Failed to save the order. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>