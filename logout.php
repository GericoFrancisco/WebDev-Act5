<?php
    session_start();

    if(isset($_SESSION['activeUser'])){
        setOffline($_SESSION['activeUser']);
        echo $_SESSION['activeUser'];
    }else{
        echo "nothing";
    }

    unset($_SESSION['users']);
    session_destroy();

    function setOffline($usn){
        $xml = new DOMDocument();
        $xml->load("users.xml");
        
        $userList = $xml->getElementsByTagName("user");
    
        foreach($userList as $user){
            if($usn == $user->getAttribute("username")){
                //get old values
                $password = $user->getElementsByTagName("password")[0]->nodeValue;
                $fname = $user->getElementsByTagName("firstName")[0]->nodeValue;
                $lname = $user->getElementsByTagName("lastName")[0]->nodeValue;
                $pic = $user->getElementsByTagName("profilePic")[0]->nodeValue;
    
                $newNode = $xml->createElement("user");
                $newNode->setAttribute("username", $usn);
                $newNode->appendChild($xml->createElement("password", $password));
                $newNode->appendChild($xml->createElement("firstName", $fname));
                $newNode->appendChild($xml->createElement("lastName", $lname));
                $newNode->appendChild($xml->createElement("profilePic", $pic));
                $newNode->appendChild($xml->createElement("status", "offline"));
    
                $oldNode = $user;
    
                $xml->getElementsByTagName("users")[0]->replaceChild($newNode, $oldNode);
                $xml->save("users.xml");
    
                break;
            }
        }
    
    }
?>