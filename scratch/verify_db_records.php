<?php
include_once __DIR__ . '/../admin/include/config.php';

$res = mysqli_query($con, "SELECT * FROM inquiries ORDER BY id DESC");
echo "Total inquiries found: " . mysqli_num_rows($res) . "\n\n";

while ($row = mysqli_fetch_assoc($res)) {
    echo "ID: " . $row['id'] . "\n";
    echo "Name: " . $row['name'] . "\n";
    echo "Email: " . $row['email'] . "\n";
    echo "Phone: " . $row['phone'] . "\n";
    echo "Type: " . $row['type'] . "\n";
    echo "Test Name: " . ($row['test_name'] ?? 'NULL') . "\n";
    echo "Message: " . $row['message'] . "\n";
    echo "Date: " . $row['created_at'] . "\n";
    echo "---------------------------------------------------\n";
}
?>
