<?php
include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

$query = "CREATE TABLE IF NOT EXISTS inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    message TEXT,
    test_name VARCHAR(255) DEFAULT NULL,
    type VARCHAR(50) DEFAULT 'contact',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($con, $query)) {
    echo "Created 'inquiries' table successfully.\n";
} else {
    echo "Failed to create 'inquiries' table: " . mysqli_error($con) . "\n";
}
