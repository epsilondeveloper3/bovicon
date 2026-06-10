<?php
include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

// =============================
// CREATE PAGES TABLE
// =============================
$query = "CREATE TABLE IF NOT EXISTS pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(50) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($con, $query)) {
    echo "Created 'pages' table successfully.\n";
} else {
    echo "Failed to create 'pages' table: " . mysqli_error($con) . "\n";
    exit;
}

// =============================
// SEED DEFAULT PRIVACY POLICY
// =============================
$privacyContent = '
<p>Welcome to BOVICAN Diagnostics & Research. We are highly committed to protecting the privacy of our clients, veterinarian partners, and farm owners. This Privacy Policy details how we handle personal identifiers and veterinary diagnostic data submitted through our booking forms, emails, and phone consultations.</p>

<h4>1. Information We Collect</h4>
<p>To perform accurate laboratory diagnostics and deliver patient reports, we collect the following categories of information:</p>
<ul>
  <li><strong>Contact Details:</strong> Client/owner name, veterinary clinic name, registered email address, and active phone numbers.</li>
  <li><strong>Sample Collection Details:</strong> Physical farm address or sample collection location.</li>
  <li><strong>Veterinary Medical Information:</strong> Animal breed, age, gender, symptoms, case history, and requested diagnostic testing panels.</li>
</ul>

<h4>2. How We Use Your Information</h4>
<p>We utilize the collected datasets strictly for scientific, clinical, and administrative purposes:</p>
<ul>
  <li>To register samples in our laboratory database and generate pathology and molecular profiles.</li>
  <li>To dispatch diagnostics reports and analysis results to owners and authorized veterinarians.</li>
  <li>To send email notifications, booking updates, and billing statements.</li>
  <li>To maintain reference history records inside our secure admin dashboard for future patient follow-ups.</li>
</ul>

<h4>3. Confidentiality of Laboratory Reports</h4>
<p>All veterinary diagnostics profiles, medical reports, and DNA markers are classified as **highly confidential**. Reports are shared only with:</p>
<ul>
  <li>The registered owner who requested the diagnostic booking.</li>
  <li>The attending veterinarian or consultant clinic designated during sample registration.</li>
  <li>Official government regulatory authorities in cases of mandatory infectious disease reporting (e.g., foot-and-mouth, brucellosis).</li>
</ul>

<h4>4. Data Security & Storage</h4>
<p>We store all records in local databases secured with advanced firewall access controls. Form inquiries are secured during transfer using standard secure socket protocols. Only authorized lab administrators and staff can access patient details inside the dashboard.</p>

<h4>5. Information Sharing and Third Parties</h4>
<p>BOVICAN never sells, leases, or shares veterinary or contact data with third-party organizations for promotional or marketing campaigns. We only collaborate with laboratory networks to process specific specialized panels under strictly signed non-disclosure agreements.</p>

<h4>6. Contact Us</h4>
<p>If you have any questions, concerns, or requests regarding this policy or the privacy of your diagnostics data, feel free to email our help desk at <a href="mailto:info.bovicanvet@gmail.com" style="color: #FF8E25; font-weight: 700;">info.bovicanvet@gmail.com</a>.</p>
';

$slug = 'privacy-policy';
$title = 'Privacy Policy';

// Check if already exists
$check = mysqli_query($con, "SELECT id FROM pages WHERE slug = '$slug'");
if ($check && mysqli_num_rows($check) > 0) {
    // Update it
    $escapedContent = mysqli_real_escape_string($con, $privacyContent);
    $escapedTitle = mysqli_real_escape_string($con, $title);
    mysqli_query($con, "UPDATE pages SET title = '$escapedTitle', content = '$escapedContent' WHERE slug = '$slug'");
    echo "Updated 'privacy-policy' content in pages table.\n";
} else {
    // Insert it
    $escapedContent = mysqli_real_escape_string($con, $privacyContent);
    $escapedTitle = mysqli_real_escape_string($con, $title);
    mysqli_query($con, "INSERT INTO pages (slug, title, content) VALUES ('$slug', '$escapedTitle', '$escapedContent')");
    echo "Inserted 'privacy-policy' content in pages table.\n";
}
?>
