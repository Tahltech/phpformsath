<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../database.php';
require_once __DIR__ . "/../functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {

    redirect("../index.php");
}

$username = validateInput($_POST['username']);
$password = validateInput($_POST['password']);

if (empty($username) || empty($password)) {
   $query = ['error' => "emoty fields"];
    $data = http_build_query($query);
    redirect("../index.php?data=$data");
}
$query = $connection->prepare("SELECT * FROM users 
    WHERE email = ? OR name = ?
");
$query->bind_param("ss", $username, $username);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['userid'] = $user['id'];
        $_SESSION['user'] = $user['name'];
         $_SESSION['role'] = $user['role'];
        if($user['role'] =='admin'){
              redirect("../dashboard/admindashboard.php");

        }else{


          redirect("../dashboard/userdashboard.php");}
    } else {

        $query = ['error' => "invalid_credentails"];
        $data = http_build_query($query);
        redirect("../index.php?data=$data");
    }
} else {

    $query = ['error' => "invalid_credentails"];
    $data = http_build_query($query);
    redirect("../index.php?data=$data");
}
