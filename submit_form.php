<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST["firstName"];
    // Collect other form fields similarly

    // Collect benefit status and set associated fees
    $benefitStatus = $_POST["benefitStatus"];
    $deliveryFee = $additionalFee = 0;

    switch ($benefitStatus) {
        case 'LCF':
            $deliveryFee = 50000;
            $additionalFee = 1000;
            break;
        case 'SCF':
            $deliveryFee = 200000;
            $additionalFee = 4000;
            break;
        case 'HCF':
            $deliveryFee = 900000;
            // Additional fee for HCF (TAX CHARGE)
            $additionalFee = 20000;
            break;
    }

    // Compose email message
    $to = "your_email@example.com";
    $subject = "RDCF Program Application Form Submission";
    $message = "First Name: " . $firstName . "\n" .
               // Include all other form fields in a similar manner
               "Benefit Status: " . $benefitStatus . "\n" .
               "Delivery Fee: $" . number_format($deliveryFee, 2) . "\n" .
               "Additional Fee: $" . number_format($additionalFee, 2) . "\n";

    // Send email
    $headers = "From: webmaster@example.com"; // Replace with your email
    mail($to, $subject, $message, $headers);

    // Redirect to a thank you page
    header("Location: thank_you.html");
    exit();
} else {
    // If someone tries to access this page directly without submitting the form
    header("Location: index.html");
    exit();
}
?>
