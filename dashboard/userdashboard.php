<?php
require_once __DIR__ . "/../functions.php";
session_start();
$user = $_SESSION['user'] ?? null;

if (!checkAuth($user) || $_SESSION['role'] !== "user") {
    redirect("../login.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userdashboard</title>
</head>
<body>
    <h1>this isjust the user dashboard</h1>
</body>
</html>