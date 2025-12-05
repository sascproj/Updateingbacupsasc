<?php
session_start();
include "connection.php";

// Check required fields
if (!isset($_POST['college_name']) || !isset($_POST['college_code'])) {
    die("Required data missing.");
}

$college_name   = $_POST['college_name'];
$college_code   = $_POST['college_code'];
$college_email  = $_POST['college_email'];
$contact_person = $_POST['contact_person'];

// Generate login credentials
$username = strtolower($college_code) . "_admin";
$password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);

// Insert into colleges table
$query = "INSERT INTO colleges (college_name, college_code, college_email, contact_person, username, password)
          VALUES ('$college_name', '$college_code', '$college_email', '$contact_person', '$username', '$password')";

if ($conn->query($query)) {

    echo "
        <script>
            alert('College added successfully!\\n\\nUsername: $username\\nPassword: $password');
            window.location.href = 'superadmindashboard.php';
        </script>
    ";
} else {
    echo "Error: " . $conn->error;
}

?>
