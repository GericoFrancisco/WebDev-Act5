<?php
session_start();
$username = "";
$password = "";
if(isset($_GET['username']))
    $username = $_GET['username'];
if(isset($_GET['password']))
    $password = $_GET['password'];

$xml = new DOMDocument();
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
        setOnline($username);
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

function setOnline($usn){
    $xml = new DOMDocument();
    $xml->load("users.xml");
    
    $userList = $xml->getElementsByTagName("user");

    foreach($userList as $user){
        if($usn == $user->getAttribute("username")){
            //get old values
            $pw = $user->getElementsByTagName("password")[0]->nodeValue;
            $fname = $user->getElementsByTagName("firstName")[0]->nodeValue;
            $lname = $user->getElementsByTagName("lastName")[0]->nodeValue;
            $pic = $user->getElementsByTagName("profilePic")[0]->nodeValue;

            $newNode = $xml->createElement("user");
            $newNode->setAttribute("username", $usn);
            $newNode->appendChild($xml->createElement("password", $pw));
            $newNode->appendChild($xml->createElement("firstName", $fname));
            $newNode->appendChild($xml->createElement("lastName", $lname));
            $newNode->appendChild($xml->createElement("profilePic", $pic));
            $newNode->appendChild($xml->createElement("status", "online"));

            $oldNode = $user;

            $xml->getElementsByTagName("users")[0]->replaceChild($newNode, $oldNode);
            $xml->save("users.xml");
            $_SESSION["activeUser"] = $usn;
            break;
        }
    }

}

