<?php
include_once 'admin/include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, trim($_POST['contact-name'] ?? ''));
    $email = mysqli_real_escape_string($con, trim($_POST['contact-email'] ?? ''));
    $phone = mysqli_real_escape_string($con, trim($_POST['contact-phone'] ?? ''));
    $message = mysqli_real_escape_string($con, trim($_POST['contact-message'] ?? ''));
    $test_name = mysqli_real_escape_string($con, trim($_POST['contact-test'] ?? ''));

    if ($name === '' || $email === '' || $phone === '') {
        $redir = ($test_name !== '') ? 'tests.php' : 'contact-us.php';
        header("Location: $redir?error=empty_fields");
        exit;
    }

    // Determine inquiry type
    $type = 'demo';
    if ($test_name !== '') {
        $type = 'booking';
    }

    // Insert into database
    $query = "INSERT INTO inquiries (name, email, phone, message, test_name, type) 
              VALUES ('$name', '$email', '$phone', '$message', " . ($test_name !== '' ? "'$test_name'" : "NULL") . ", '$type')";
    
    $inserted = mysqli_query($con, $query);

    // Send Email to Admin
    $admin_email = "info.bovicanvet@gmail.com";
    $subject = ($type === 'booking') ? "New Test Booking Request: $test_name" : "New Contact / Demo Request";
    
    $body = "Dear Admin,\n\n";
    $body .= "You have received a new customer inquiry from the BOVICAN website.\n\n";
    $body .= "--- Customer Details ---\n";
    $body .= "Name: " . stripslashes($name) . "\n";
    $body .= "Email: " . stripslashes($email) . "\n";
    $body .= "Phone: " . stripslashes($phone) . "\n";
    
    if ($type === 'booking') {
        $body .= "Type: Test Booking\n";
        $body .= "Test Name: " . stripslashes($test_name) . "\n";
    } else {
        $body .= "Type: Book a Demo / General Inquiry\n";
    }
    
    $body .= "Additional Message:\n" . stripslashes($message) . "\n\n";
    $body .= "Submitted At: " . date("Y-m-d H:i:s") . "\n";
    
    $headers = "From: BOVICAN Webmaster <no-reply@bovicon.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    @mail($admin_email, $subject, $body, $headers);

    if ($inserted) {
        $redir = ($type === 'booking') ? 'tests.php' : 'contact-us.php';
        header("Location: $redir?success=1");
    } else {
        $redir = ($type === 'booking') ? 'tests.php' : 'contact-us.php';
        header("Location: $redir?error=database_error");
    }
    exit;
} else {
    header("Location: index.php");
    exit;
}
