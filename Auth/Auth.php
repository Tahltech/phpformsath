<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    redirect("../index.php");
}

$username = validateInput($_POST['username']);
$password = validateInput($_POST['password']);

if (empty($username) || empty($password)) {
    $query = ['error' => 'empty_fields'];
    redirect("../index.php?" . http_build_query($query));
}

// Prepare login query
$query = $connection->prepare("SELECT * FROM users 
    WHERE email = ? OR name = ?
");
$query->bind_param("ss", $username, $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows === 0) {
    $query = ['error' => 'invalid_credentials'];
    redirect("../index.php?" . http_build_query($query));
}

$user = $result->fetch_assoc();

if (!password_verify($password, $user['password'])) {
    $query = ['error' => ' no pass invalid_credentials'];
    redirect("../index.php?" . http_build_query($query));
}

// Login success
$_SESSION['userid'] = $user['id'];
$_SESSION['user']   = $user['name'];
$_SESSION['role']   = $user['role'];

// Redirect based on role
if ($user['role'] === 'admin') {
    redirect("../dashboard/admindashboard.php");
} else {
    redirect("../dashboard/userdashboard.php");
}

