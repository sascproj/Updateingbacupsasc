<?php
$conn = new mysqli("localhost", "root", "", "unifest_db");

$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE registration_settings SET status=? WHERE id=1");
$stmt->bind_param("s", $status);
$stmt->execute();

echo "success";
?>


