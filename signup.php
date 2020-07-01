<html lang = "en">
    <head>
        <title>Sign Up!</title>
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
        <style type = "text/css">
            body {
                font-family: "Lato", sans-serif;
            }
            #title {
                
                color: white;
                font-family: 'Julius Sans One', sans-serif;

                
            }


            .main-head{
                height: 150px;
                background: #FFF;
   
            }

            .sidenav {
                height: 100%;
                background-color: #000;
                overflow-x: hidden;
                padding-top: 20px;
            }


            .main {
                padding: 0px 10px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
            }

            @media screen and (max-width: 450px) {
                .login-form{
                    margin-top: 5%;
                }

                .register-form{
                    margin-top: 5%;
                }
            }

            @media screen and (min-width: 768px){
                .main{
                    margin-left: 40%; 
                }

                .sidenav{
                    width: 40%;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                }

                .login-form{
                    margin-top: 0%;
                }

                .register-form{
                    margin-top: 20%;
                }
            }


            .login-main-text{
                margin-top: 20%;
                padding: 60px;
                color: #fff;
            }

            .login-main-text h2{
                font-weight: 300;
            }

            .btn-black{
                background-color: #000 !important;
                color: #fff;
            }  
            
            
        </style>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="icon" href="password.png">
    </head>


<div class="sidenav">
         <div class="login-main-text">
            <h2><div id="title">Password Manager<br></div> Sign Up</h2>
            <p>Sign Up or Log In from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <a href="index.php"><img src="homeicon24.png" style="margin-left: 200%;"></a>
            <div class="login-form">
               <form method="post" name="signup" id="signup">
                   <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" placeholder="Name" name="name" required>
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                  </div>
                  <div class="form-group">
                     <label>Password    <div name="pwdreq" id="pwdreq"></div></label>
                     <input type="password" class="form-control" placeholder="Password" onfocus="prompt()" id="password" required oninput="strengthcheck()" name="password">
                     <div id="strong"></div>
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" placeholder="Confirm Password" required id="confirmpassword" oninput="confirm_password()"  name="confirmpassword">
                     <div id="match"></div>
                  </div>
                  <div class="form-group">
                     <label>Security Question #1: Your mother's maiden name <br></label>
                     <input type="text" class="form-control" placeholder="eg: Mary" id="sq1" name="sq1" required>
                  </div>
                  <div class="form-group">
                     <label>Security Question #2: Dream vacation destination <br></label>
                     <input type="text" class="form-control" placeholder="eg: Tokyo" id="sq2" name="sq2" required>
                  </div>
                  
                  
                  <button type="submit" class="btn btn-black" id="signuppls">Sign Up</button>
                  <a href="login.php"><button type="button" class="btn btn-success">Log in</button></a>
                  <br><br><p><small> (Log in if you've already signed up) </small></p>
                  </form>
                  
                  
                
               
            </div>
         </div>
      </div>
      
    <script>
        var strong = document.getElementById("strong")
        var match = document.getElementById("match")
        var promptbox = document.getElementById("pwdreq")
        var spchar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/
        var hasNumber = /\d/;
        
        var password = document.signup.password
        var password2 = document.signup.confirmpassword
        
        function prompt() {
            promptbox.innerHTML="<div class='alert alert-warning alert-dismissible fade show' role='alert'><small>Password should contain numbers and special characters, and should be minimum 7 characters in length</small></div>"
        }
        
        function strengthcheck(){
            if (password.value.length>6){
                if (hasNumber.test(password.value) == true) {
                    if (spchar.test(password.value)== true) {
                        strong.innerHTML="<p style='color:green'>strong</p>"
                        promptbox.style.display = "none"
                        password.style.borderColor = "green"
                        document.getElementById("signuppls").disabled = false
                    }
                    else {
                        strong.innerHTML="<p style='color:orange'>medium</p>"
                        password.style.borderColor = "yellow"
                        document.getElementById("signuppls").disabled = false
                    }
                
                }
                else {
                    if (spchar.test(password.value) == true) {
                        strong.innerHTML="<p style='color:orange'>medium</p>"
                        password.style.borderColor = "yellow"
                        document.getElementById("signuppls").disabled = false
                        
                    }
                    else {
                    strong.innerHTML="<p style='color:red'>weak</p>"
                    password.style.borderColor = "red"
                    document.getElementById("signuppls").disabled = true
                    }
                }
            }
            
            
            else {
                strong.innerHTML="<p style='color:red'>weak</p>"
                password.style.borderColor = "red"
                document.getElementById("signuppls").disabled = true
            }
        }
        function confirm_password(){
            var pass1 = password.value
            var pass2 = password2.value
            if (pass1.localeCompare(pass2) == 0) {
                match.innerHTML="<p style='color: green'>Passwords Match</p>"
                confirmpassword.style.borderColor = "green"
                document.getElementById("signuppls").disabled = false
            }
            else {
                match.innerHTML="<p style='color: red'>Passwords Don't Match</p>"
                confirmpassword.style.borderColor = "red"
                document.getElementById("signuppls").disabled = true
            }
            
            
        }
    </script>
      
</html>

<?php

if (array_key_exists('name', $_POST) or array_key_exists('username', $_POST) or array_key_exists('password', $_POST) or array_key_exists('sq1', $_POST) or array_key_exists('sq2', $_POST)) {
    
    //echo "<p style='margin-left:75%;'>Hi</p>";
    //checking if loop is entering
    
    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
    if (mysqli_connect_error()) {
    
    //echo "<p style='margin-left:75%;'>dbconnection error</p>";
    die ("There was an issue with connecting to the database.");
    
    }
    
    
        $query = "SELECT `id` from `pwdlogin` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
        
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0){
            echo "<div class='alert alert-danger' role='alert' align='right'>
  That username has already been taken. Click login, if that's you.
</div>";
        }
    
        else {
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO `pwdlogin` (`name`, `username`, `password`, `sq1`, `sq2`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $hashed_password)."', '".mysqli_real_escape_string($link, $_POST['sq1'])."', '".mysqli_real_escape_string($link, $_POST['sq2'])."')";
            
            if (mysqli_query($link, $query)) {
                
                
                
                $idquery = "SELECT `id` from `pwdlogin` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                $idresult = mysqli_query($link, $idquery);
                $id = mysqli_fetch_array($idresult);
                session_start();
                $_SESSION["id"] = $id[0];
                echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                
                
                
            }
            else {
                echo "<div class='alert alert-danger' role='alert' align='right'>
  There was a problem signing you up, please try later
</div>";
        }
    }
}




?>
