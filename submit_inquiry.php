<?php
include_once 'admin/include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, trim($_POST['contact-name'] ?? ''));
    $phone = mysqli_real_escape_string($con, trim($_POST['contact-phone'] ?? ''));
    $message = mysqli_real_escape_string($con, trim($_POST['contact-message'] ?? ''));
    $test_name = mysqli_real_escape_string($con, trim($_POST['contact-test'] ?? ''));

    $city = '';
    $doctor_name = '';
    $email = '';

    if ($test_name !== '') {
        // Booking request
        $city = mysqli_real_escape_string($con, trim($_POST['contact-city'] ?? ''));
        $doctor_name = mysqli_real_escape_string($con, trim($_POST['contact-doctor'] ?? ''));
        
        if ($name === '' || $city === '' || $phone === '') {
            header("Location: tests.php?error=empty_fields");
            exit;
        }
    } else {
        // General Contact / Demo request
        $email = mysqli_real_escape_string($con, trim($_POST['contact-email'] ?? ''));
        
        if ($name === '' || $email === '' || $phone === '') {
            header("Location: contact-us.php?error=empty_fields");
            exit;
        }
    }

    // Determine inquiry type
    $type = 'demo';
    if ($test_name !== '') {
        $type = 'booking';
    }

    // Insert into database
    $query = "INSERT INTO inquiries (name, email, city, doctor_name, phone, message, test_name, type) 
              VALUES ('$name', " . ($email !== '' ? "'$email'" : "NULL") . ", " . ($city !== '' ? "'$city'" : "NULL") . ", " . ($doctor_name !== '' ? "'$doctor_name'" : "NULL") . ", '$phone', '$message', " . ($test_name !== '' ? "'$test_name'" : "NULL") . ", '$type')";
    
    $inserted = mysqli_query($con, $query);

    // Send Email to Admin
    $admin_email = "info.bovicanvet@gmail.com";
    $subject = ($type === 'booking') ? "New Test Booking Request: $test_name" : "New Contact / Demo Request";
    
    $body = "Dear Admin,\n\n";
    $body .= "You have received a new customer inquiry from the BOVICAN website.\n\n";
    $body .= "--- Customer Details ---\n";
    $body .= "Name: " . stripslashes($name) . "\n";
    if ($type === 'booking') {
        $body .= "City: " . stripslashes($city) . "\n";
    } else {
        $body .= "Email: " . stripslashes($email) . "\n";
    }
    $body .= "Phone: " . stripslashes($phone) . "\n";
    
    if ($type === 'booking') {
        $body .= "Type: Test Booking\n";
        $body .= "Test Name: " . stripslashes($test_name) . "\n";
        if ($doctor_name !== '') {
            $body .= "Reference Doctor Name: " . stripslashes($doctor_name) . "\n";
        }
    } else {
        $body .= "Type: Book a Demo / General Inquiry\n";
    }
    
    $body .= "Additional Message:\n" . stripslashes($message) . "\n\n";
    $body .= "Submitted At: " . date("Y-m-d H:i:s") . "\n";
    
    $headers = "From: BOVICAN Webmaster <no-reply@bovicon.com>\r\n";
    if ($email !== '') {
        $headers .= "Reply-To: $email\r\n";
    }
    $headers .= "X-Mailer: PHP/" . phpversion();

    @mail($admin_email, $subject, $body, $headers);

    if ($inserted) {
        // Send WhatsApp Notification
        include_once 'includes/whatsapp_helper.php';
        if ($type === 'booking') {
            $wa_city = $city;
            $wa_doc = $doctor_name;
            $wa_detail = $test_name;
            if ($message !== '') {
                $wa_detail .= " | " . $message;
            }
        } else {
            $wa_city = 'N/A';
            $wa_doc = 'N/A';
            $wa_detail = "General Contact / Demo";
            if ($email !== '') {
                $wa_detail .= " | Email: " . $email;
            }
            if ($message !== '') {
                $wa_detail .= " | Msg: " . $message;
            }
        }
        send_whatsapp_inquiry($name, $wa_city, $phone, $wa_doc, $wa_detail);

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
