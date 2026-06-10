<?php
include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

// =============================
// CREATE TABLES
// =============================

// Testimonials table
$query1 = "CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    designation VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    avatar VARCHAR(50) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($con, $query1)) {
    echo "Created 'testimonials' table successfully.\n";
} else {
    echo "Failed to create 'testimonials' table: " . mysqli_error($con) . "\n";
}

// FAQs table
$query2 = "CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer TEXT NOT NULL,
    status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($con, $query2)) {
    echo "Created 'faqs' table successfully.\n";
} else {
    echo "Failed to create 'faqs' table: " . mysqli_error($con) . "\n";
}

// =============================
// SEED DATA
// =============================

// Clear tables first
mysqli_query($con, "TRUNCATE TABLE testimonials");
mysqli_query($con, "TRUNCATE TABLE faqs");

// Testimonials Seed
$testimonials = [
    [
        'name' => 'Dr. Rajesh Patel',
        'designation' => 'Chief Veterinarian, Anand Animal Hospital',
        'text' => 'BOVICAN has transformed our clinical diagnostics. Their quick turnaround time for CBC and biochemistry profiles allows us to start precise treatments immediately. The accuracy is unmatched.',
        'avatar' => 'RP'
    ],
    [
        'name' => 'Dr. Shalini Mehta',
        'designation' => 'Director, VetCare Diagnostics & Labs',
        'text' => 'We regularly refer complex cases to BOVICAN. Their molecular pathology and DNA tests for cattle have been crucial in identifying and controlling infectious outbreaks in multiple dairy farms.',
        'avatar' => 'SM'
    ],
    [
        'name' => 'Dr. Arthur Fernandes',
        'designation' => 'Senior Vet Consultant, Goats & Dairy Farms Association',
        'text' => 'Outstanding support! The farm-visit sample collection service is extremely convenient for large herds. Their detailed profiles have helped us improve overall livestock productivity significantly.',
        'avatar' => 'AF'
    ]
];

foreach ($testimonials as $t) {
    $name = mysqli_real_escape_string($con, $t['name']);
    $desig = mysqli_real_escape_string($con, $t['designation']);
    $text = mysqli_real_escape_string($con, $t['text']);
    $avatar = mysqli_real_escape_string($con, $t['avatar']);
    
    $q = "INSERT INTO testimonials (name, designation, text, avatar) VALUES ('$name', '$desig', '$text', '$avatar')";
    mysqli_query($con, $q);
}
echo "Seeded 'testimonials' data.\n";

// FAQs Seed
$faqs = [
    [
        'question' => 'What types of animals do you offer diagnostic testing for?',
        'answer' => 'We specialize in veterinary diagnostics for cattle, buffaloes, sheep, goats, horses, dogs, cats, and poultry. Our testing panels are specifically designed for veterinary health profiles.'
    ],
    [
        'question' => 'How can I book a test or request a sample collection?',
        'answer' => 'You can book any test directly from our Tests page by clicking "Book Now" on the test card, which will open a booking request popup. Alternatively, you can fill out the contact form on our "Contact Us" page or call our help desk.'
    ],
    [
        'question' => 'What is the typical turnaround time (TAT) for laboratory reports?',
        'answer' => 'Most routine tests like CBC, blood chemistry, and basic hormone profiles are delivered within 24 hours. Specialized molecular tests and culture reports may take 48 to 72 hours.'
    ],
    [
        'question' => 'Do you provide farm-visit sample collection services?',
        'answer' => 'Yes, we offer professional door-step sample collection at farms and veterinary clinics. Our trained lab technicians handle sample retrieval using proper temperature-controlled shipping kits.'
    ],
    [
        'question' => 'How will I receive the diagnostic test reports?',
        'answer' => 'Once the test is completed, reports are sent immediately to your registered email address and WhatsApp number. Registered veterinary clinics can also request cumulative patient histories.'
    ]
];

foreach ($faqs as $f) {
    $q = mysqli_real_escape_string($con, $f['question']);
    $a = mysqli_real_escape_string($con, $f['answer']);
    
    $q_query = "INSERT INTO faqs (question, answer, status) VALUES ('$q', '$a', 1)";
    mysqli_query($con, $q_query);
}
echo "Seeded 'faqs' data.\n";
?>
