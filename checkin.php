<?php
session_start();

// Database Connection
$conn = new mysqli("localhost", "root", "", "unifest_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if (!isset($_POST["user_type"])) {
    header("Location: index.php");
    exit();
}

$user_type = $_POST["user_type"];

// ==================================
// SUPER ADMIN & COLLEGE ADMIN LOGIN
// (WITH PASSWORD)
// ==================================
if ($user_type === "super_admin" || $user_type === "college_admin") {

    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("
        SELECT * FROM users 
        WHERE email = ? 
        AND password = ?
        AND user_type = ?
        LIMIT 1
    ");
    $stmt->bind_param("sss", $email, $password, $user_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();
        session_regenerate_id(true);

        $_SESSION["user_id"]   = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_type"] = $user["user_type"];

        if ($user_type === "super_admin") {
            header("Location: superadmindashboard.php");
            exit();
        }

        if ($user_type === "college_admin") {
            header("Location: collegedashboard.php");
            exit();
        }
    }

    echo "<script>alert('Invalid Email or Password!'); window.location.href='index.php';</script>";
    exit();
}

// =====================
// STUDENT LOGIN
// (NO PASSWORD)
// =====================
if ($user_type === "student") {

    $student_code = trim($_POST["student_code"]);

    $stmt = $conn->prepare("
        SELECT * FROM users 
        WHERE student_code = ?
        AND user_type = 'student'
        LIMIT 1
    ");
    $stmt->bind_param("s", $student_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();
        session_regenerate_id(true);

        $_SESSION["student_id"]   = $user["id"];
        $_SESSION["student_name"] = $user["name"];
        $_SESSION["student_code"] = $user["student_code"];
        $_SESSION["user_type"]    = "student";

        header("Location: studentdashboard.php");
        exit();
    }

    echo "<script>alert('Invalid Student Code!'); window.location.href='index.php';</script>";
    exit();
}
?>
