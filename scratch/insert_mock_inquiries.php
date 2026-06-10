<?php
include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

// Clear existing inquiries first if any, or just insert
mysqli_query($con, "TRUNCATE TABLE inquiries");

// Mock Inquiries
$queries = [
    "INSERT INTO inquiries (name, email, phone, message, test_name, type) 
     VALUES ('Rajesh Kumar', 'rajesh.kumar@example.com', '+91 98765 43210', 'I would like to request a demo of the veterinary testing machine and understand the licensing model.', NULL, 'demo')",
    
    "INSERT INTO inquiries (name, email, phone, message, test_name, type) 
     VALUES ('Dr. Amit Patel', 'amit.patel@veterinary.org', '+91 91234 56789', 'Urgent booking request for a dairy cow showing high fever and fatigue symptoms.', 'Complete Blood Count (CBC) with Vet Differential', 'booking')"
];

foreach ($queries as $idx => $q) {
    if (mysqli_query($con, $q)) {
        echo "Mock inquiry #" . ($idx + 1) . " inserted successfully.\n";
    } else {
        echo "Failed to insert mock inquiry #" . ($idx + 1) . ": " . mysqli_error($con) . "\n";
    }
}
?>
