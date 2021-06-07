<?php
session_start();
$username = "";
$password = "";
if(isset($_GET['username']))
    $username = $_GET['username'];
if(isset($_GET['password']))
    $password = $_GET['password'];

$xml = $xml = new DOMDocument();
$xml->load("users.xml");

$userList = $xml->getElementsByTagName("user");

// $response = "Missing";

$_SESSION["users"] = "Wrong";
foreach($userList as $user){
    $usn = $user->getAttribute("username");
    $pw = $user->getElementsByTagName("password")[0]->nodeValue;
    if(($username == $usn && $password == $pw) && (strlen($password) == strlen($pw))){
        $response = "Correct";
        $_SESSION["users"] = "Correct";
        break;
    }
    else if($username == "" || $password == ""){
        $response = "Missing";
    }
    else if($username != $usn || $password != $pw){
        $response = "Wrong";
    }
}
echo $response;

