<?php
session_start();

// Database Connection
$conn = new mysqli("localhost", "root", "", "unifest_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Identify login type
$user_type = $_POST["user_type"];

// =====================
// SUPER ADMIN & COLLEGE ADMIN LOGIN
// =====================
if ($user_type == "super_admin" || $user_type == "college_admin") {

    $email = $_POST["email"];
    $password = md5($_POST["password"]); // hashed password

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND user_type='$user_type' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // Store session data
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_type"] = $user["user_type"];

        // Redirect based on role
        if ($user_type == "super_admin") {
            header("Location: superadmindashboard.php");
            exit();
        }

        if ($user_type == "college_admin") {
            header("Location: collegedashboard.php");
            exit();
        }

    } else {
        echo "<script>alert('Invalid Email or Password!'); window.location.href='index.php';</script>";
        exit();
    }
}

// =====================
// STUDENT LOGIN
// =====================
if ($user_type == "student") {

    $student_code = $_POST["student_code"];

    $query = "SELECT * FROM users WHERE student_code='$student_code' AND user_type='student' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        $_SESSION["student_id"] = $user["id"];
        $_SESSION["student_name"] = $user["name"];
        $_SESSION["student_code"] = $user["student_code"];

        header("Location: studentdashboard.php");
        exit();

    } else {
        echo "<script>alert('Invalid Student Code!'); window.location.href='index.php';</script>";
        exit();
    }
}

?>
