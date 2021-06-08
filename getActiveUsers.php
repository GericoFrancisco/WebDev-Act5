<?php

$xml = $xml = new DOMDocument();
$xml->load("users.xml");

$userList = $xml->getElementsByTagName("user");

$onlineUsers = "active users: </br>";
foreach($userList as $user){
    $activeStatus = $user->getElementsByTagName("status")[0]->nodeValue;

    if($activeStatus == "online"){
        $onlineUsers .= $user->getAttribute("username") . "</br>";
    }
}
echo $onlineUsers;