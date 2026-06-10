<?php
// Mock POST request data
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['contact-name'] = 'CLI Test Customer';
$_POST['contact-email'] = 'cli.test@example.com';
$_POST['contact-phone'] = '+91 99999 88888';
$_POST['contact-message'] = 'Testing contact form submission from command line verification script.';
$_POST['contact-test'] = 'Complete Blood Count (CBC) with Vet Differential';

echo "Simulating form submission...\n";

// Run the submission script
include __DIR__ . '/../submit_inquiry.php';

// If it exits, this line won't run, which is expected.
echo "Simulation completed.\n";
?>
