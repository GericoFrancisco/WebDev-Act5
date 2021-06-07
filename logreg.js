var d = document;

d.getElementById('signin').addEventListener('click', login);
d.getElementById('sign_up').addEventListener('click', showRegistration);

function login(e){
    e.preventDefault();
    var usn = d.getElementById('username').value;
    var pw = d.getElementById('password').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'login.php?username='+usn+"&password="+pw,true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            // console.log(xhr.response);
            console.log(this.responseText);
            if(this.responseText == "Correct")
                window.location.replace("table.php");
            else if(this.responseText == "Wrong")
                alert("Incorrect Username/Password");
            else
                alert("Incomplete Credentials");
        }
    }
    xhr.send();
}

function register(){
    var usn = d.getElementById('usn').value;
    var pw = d.getElementById('pw').value;
    var conpw = d.getElementById('conpw').value;
    var fname = d.getElementById('fname').value;
    var lname = d.getElementById('lname').value;

    if(pw == conpw && (usn != "" && pw != "") && (usn != " " && pw != " ")){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'register.php?username='+usn+"&password="+pw+"&fname="+fname+"&lname="+lname,true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                // console.log(xhr.response);
                if(this.responseText == "Free"){
                    showLogin();
                    alert("Account Created");
                    // window.location.replace("index.html");
                }
                else if(this.responseText == "Taken")
                    alert("Username/Password taken");
            }
        }
        xhr.send();
    }
    else if(pw != conpw)
    alert("Password do not match");
    else
    alert("Username/Password is required")
}

function showRegistration(){
    var regText = "<form class='form' id='register'>"+
        "<h1 class='form_title'>Create Account</h1>"+
        "<div class='forms'><input type='text' class='form_input'  id='fname' autofocus placeholder='First Name'></div>"+
        "<div class='forms'><input type='text' class='form_input'  id='lname'  autofocus placeholder='Last Name'></div>"+
        "<div class='forms'><input type='text' class='form_input'  id='usn'  autofocus placeholder='Username'></div>"+
        " <div class='forms'><input type='password' class='form_input'  id='pw' autofocus placeholder='Password'></div>"+
        " <div class='forms'><input type='password' class='form_input' id='conpw' autofocus placeholder='Confirm Password'></div>"+
        "<input onclick='register()' id='reg' class='form_btn' type='button' value='Sign Up'>"+
        "<p class='form_text'><p  class='form_link' id='sign_in'>Already have an account? Sign in.</p></p>"+
        "</form>";
    d.getElementById("demo").innerHTML = regText;
    d.getElementById('sign_in').addEventListener('click', showLogin);
}

function showLogin(){
    // d.getElementById('demo').innerHTML = "";
    var loginText = "<form class='form' id='login'>"+
    "<h1 id='demotext' class='form_title'>Login</h1>"+
    "<div class='forms'>"+
    "  <input type='text' class='form_input' id='username' name='username' autofocus placeholder='Username'>"+
    "</div>"+
    "<div class='forms'>"+
    "  <input type='password' class='form_input' id='password' name='password' autofocus placeholder='Password'>"+
    "</div>"+
    "<input  id='signin' class='form_btn' type='submit' value='Sign In'>"+
    "</p>"+
    "<p class='form_text'>"+
    "  <p onclick='showRegistration()'class='form_link' id='sign_up'>Don't have an account? Create an account.</p>"+
    "</p>"+
  "</form>";
  d.getElementById("demo").innerHTML = loginText;
  d.getElementById('signin').addEventListener('click', login);
}