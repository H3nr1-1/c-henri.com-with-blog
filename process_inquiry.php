<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $websiteType = $_POST["WebsiteType"];
    $minBudget = $_POST["Min"];
    $maxBudget = $_POST["Max"];
    $timeline = $_POST["Timeline"];
    $comment = $_POST["Comment"];

    // Compose email message
    $to = "henri@c-henri.com";
    $subject = "New Inquiry from $name";
    $headers = "From: $email";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Type of Website: $websiteType\n";
    $message .= "Budget Range: $minBudget - $maxBudget\n";
    $message .= "Timeline: $timeline\n";
    $message .= "Comments: $comment\n";

    mail($to, $subject, $message, $headers);

    // Redirect to thankyou page
    header("Location: thank_you.html");
    exit;
} else {
    // Handle non-POST requests or direct access to the script.
    echo "Error submitting form!";
}

