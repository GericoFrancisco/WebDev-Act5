<?php
session_start();
if(isset($_SESSION['users'])){
  if($_SESSION['users'] == "Correct") header("Location: table.php");
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Welcome | Login & Sign Up Form</title>
  <!-- <link rel='preconnect' href='https://fonts.gstatic.com'>
  <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap' rel='stylesheet'> -->
  <link rel='stylesheet' href='logreg.css'>
  
</head>
<body>
    <div id='demo' class='container'>

      <!--LOGIN FORM-->

      <form class='form' id='login'>
        <h1 id='demotext' class='form_title'>Login</h1>
        <div class='forms'>
          <input type='text' class='form_input' id='username' name='username' autofocus placeholder='Username'>
        </div>
        <div class='forms'>
          <input type='password' class='form_input' id='password' name='password' autofocus placeholder='Password'>
        </div>
        <input id='signin' class='form_btn' type='submit' value='Sign In'>
        <p class='form_text'>
          <p class='form_link' id='sign_up'>Don't have an account? Create an account.</p>
        </p>
      </form>

    <script src='logreg.js'></script>
</body>
</html>