<?php
$username = "";
$password = "";
$lname = "";
$fname = "";
if(isset($_GET['username']))
    $username = $_GET['username'];
if(isset($_GET['password']))
    $password = $_GET['password'];
if(isset($_GET['fname']))
    $fname = $_GET['fname'];
if(isset($_GET['lname']))
    $lname = $_GET['lname'];

$xml = $xml = new DOMDocument();
$xml->load("users.xml");

$userList = $xml->getElementsByTagName("user");

$id = [];
foreach($userList as $user){
    array_push($id,  $user->getAttribute("username"));
}

if(!in_array($username, $id)){
    //create elements
    $newUser = $xml->createElement("user");
    $newPW = $xml->createElement("password", $password);
    $newFname = $xml->createElement("firstName", $fname);
    $newLname = $xml->createElement("lastName", $lname);
    //set Attribute
    $newUser->setAttribute("username", $username);
    //appending
    $newUser->appendChild($newPW);
    $newUser->appendChild($newFname);
    $newUser->appendChild($newLname);

    $xml->getElementsByTagName("users")[0]->appendChild($newUser);
    $xml->save("users.xml");
    $response = "Free";
    }
else
    $response = "Taken";


echo $response;