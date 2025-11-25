<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/database.php';
require_once __DIR__ . "/functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Invalid Request Method";
    redirect("./index.php");
} else {

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";

    $fullName = validateInput($_POST['fullName']);
    $emailAddress = validateInput($_POST['email']);
    $password = trim($_POST['password']);
    $gender = $_POST['gender'];
    $phoneNumber = trim($_POST['phoneNumber']);
    $address = validateInput($_POST['address']);
    $placeOfBirth = validateInput($_POST['placeOfBirth']);
    $dateOfBirth = trim($_POST['dateOfBirth']);




    if (empty($fullName) || empty($emailAddress) || empty($password) || empty($gender) || empty($phoneNumber) || empty($address) || empty($placeOfBirth) || empty($dateOfBirth)) {

        echo "check the fields and try again";

        return redirect("/index.php");
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = $connection->prepare("INSERT INTO users(name,email,gender,password,phone_number,address,date_of_birth,place_of_birth)
    VALUES(?,?,?,?,?,?,?,?)");

    $query->bind_param("ssssssss", $fullName, $emailAddress, $gender, $hashedPassword, $phoneNumber, $address, $dateOfBirth, $placeOfBirth);

    $execution = $query->execute();

    if ($execution) {
        
    $query = ['success' => "user_created succesfully"];
    $data = http_build_query($query);
    redirect("./login.php?data=$data");
    }
}
