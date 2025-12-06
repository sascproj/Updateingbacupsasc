<?php
session_start();

// 1. DB Connection
$conn = new mysqli("localhost", "root", "", "unifest_db");
if ($conn->connect_error) {
    die("DB Error");
}

// 2. Check if registration is OPEN
$check = $conn->query("SELECT status FROM registration_settings WHERE id = 1");
$row = $check->fetch_assoc();

if ($row['status'] !== 'open') {
    echo "<script>alert('College registration is CLOSED!'); window.location.href='superadmindashboard.php';</script>";
    exit();
}

// 3. Get form data
$college_name    = $_POST['college_name'];
$college_code    = $_POST['college_code'];
$college_email   = $_POST['college_email'];
$contact_person  = $_POST['contact_person'];

// 4. Auto-generate login credentials
$username = strtolower($college_code) . "_admin";
$password = rand(100000, 999999); // 6 digit password (plain)

// 5. Insert into colleges table
$stmt = $conn->prepare("
INSERT INTO colleges (college_name, college_code, college_email, contact_person, username, password) 
VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssssss",  // 6 string parameters: 4 for college details, 1 for username, 1 for password
    $college_name,
    $college_code,
    $college_email,
    $contact_person,
    $username,
    $password
);

if ($stmt->execute()) {
    echo "<script>
        alert('College Added Successfully!\\nUsername: $username\\nPassword: $password');
        window.location.href='superadmindashboard.php';
    </script>";
} else {
    echo "<script>alert('College Already Exists!'); window.location.href='superadmindashboard.php';</script>";
}
?>

