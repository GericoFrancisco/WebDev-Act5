<?php session_start();
if(isset($_SESSION['users'])){
    $isLoggedIn = $_SESSION['users'];
    if($isLoggedIn == "Wrong")
        header("Location: index.php");
}else{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        #modal{
            position: absolute;
            background-color: white;
            box-shadow: black 2px 2px 2px 2px;
            width: 40%;
            border-radius: 1em;
            height: max-content;
            display: none;
        }
        #title{
            text-align: center;
            font-weight: bolder;
        }
        hr{
            height: 1.5px;
            background-color: black;
            width: 95%;
        }
        label{
            font-weight: bolder;
        }
        p:not(#title){
            text-indent: 5px;
        }
        img{
            width: 42%;
            padding-left: 2%;
            padding-right: 8px;
        }
        img, #details{
            display: inline-block;
        }
        #details{
            vertical-align: top;
        }
        #table{
            width: 90%
        }
        #user-panel{
            width: 10%;
        }
        #table, #user-panel{
            display: inline-block;
        }
        #user-panel{
            top: 10px;
            right: 5px;
            width: 200px;
            height: 500px;
            background-color: yellowgreen;
        }
    </style>
    
</head>
<body >
<!-- <body onload="getData();" > -->
    <div id="header">
        <button id="logout" >Log Out</button>
    </div>
    <div id="table"></div>
   <div id="user-panel"></div>
   <!-- <div onload="getActiveUsers();" id="user-panel"></div> -->
   <div id="modal"></div>
    <script src="table.js"></script>
</body>
</html>