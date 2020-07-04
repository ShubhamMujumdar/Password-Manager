
<html lang = "en">
    <head>
        <title>Forgot Password</title>
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
                    margin-top: 10%;
                }

                .register-form{
                    margin-top: 10%;
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
                    margin-top: 2%;
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
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="icon" href="password.png">
    </head>

<body>
    
    
    
  
<div class="sidenav">
         <div class="login-main-text">
            <h2><div id="title">Password Manager<br></div>Forgot Password</h2>
            <p>Change your password here.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <a href="/index.php"><img src="homeicon24.png" style="margin-left: 670px;"></a>
            <div class="login-form">
               <form method="post" id="changepwd" name="changepwd">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="username" class="form-control" required id="username" placeholder="Enter Username" name="username">
                  </div>
                  <div class="form-group">
                     <label>Security Question #1: What is your mother's maiden name?</label>
                     <input type="text" class="form-control" required id="sq1" placeholder="Eg: Mary" name="sq1">
                  </div>
                  <div class="form-group">
                     <label>Security Question #2: What is your dream vacation destination?</label>
                     <input type="text" class="form-control" required id="sq2" placeholder="Eg: Tokyo" name="sq2">
                     
                  </div>
                  
                  <div class="form-group">
                     <label> New Password    <div name="pwdreq" id="pwdreq"></div></label>
                     <input type="password" class="form-control" placeholder="Password" onfocus="prompt()" id="password" required oninput="strengthcheck()" name="password">
                     <div id="strong"></div>
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" placeholder="Confirm Password" required id="confirmpassword" oninput="confirm_password()"  name="confirmpassword">
                     <div id="match"></div>
                  </div>
                  <button type="submit" class="btn btn-black" id="changepwdnow">Change Password</button>
                  
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
        
        var password = document.changepwd.password
        var password2 = document.changepwd.confirmpassword
        
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
                        document.getElementById("changepwdnow").disabled = false
                    }
                    else {
                        strong.innerHTML="<p style='color:orange'>medium</p>"
                        password.style.borderColor = "yellow"
                        document.getElementById("changepwdnow").disabled = false
                    }
                
                }
                else {
                    if (spchar.test(password.value) == true) {
                        strong.innerHTML="<p style='color:orange'>medium</p>"
                        password.style.borderColor = "yellow"
                        document.getElementById("changepwdnow").disabled = false
                        
                    }
                    else {
                    strong.innerHTML="<p style='color:red'>weak</p>"
                    password.style.borderColor = "red"
                    document.getElementById("changepwdnow").disabled = true
                    }
                }
            }
            
            
            else {
                strong.innerHTML="<p style='color:red'>weak</p>"
                password.style.borderColor = "red"
                document.getElementById("changepwdnow").disabled = true
            }
        }
        function confirm_password(){
            var pass1 = password.value
            var pass2 = password2.value
            if (pass1.localeCompare(pass2) == 0) {
                match.innerHTML="<p style='color: green'>Passwords Match</p>"
                confirmpassword.style.borderColor = "green"
                document.getElementById("changepwdnow").disabled = false
            }
            else {
                match.innerHTML="<p style='color: red'>Passwords Don't Match</p>"
                confirmpassword.style.borderColor = "red"
                document.getElementById("changepwdnow").disabled = true
            }
            
            
        }
    </script>
      
    </body>  
    
</html>

<?php

//cool stuff

session_start();
if (array_key_exists('username', $_POST) or array_key_exists('password', $_POST) or array_key_exists('sq1', $_POST) or array_key_exists('sq2', $_POST)) {
    
    //connect to db
    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
    if (mysqli_connect_error()) {
    
    die ("There was an issue with connecting to the database.");
    
    }
    
     //check if username exists in db
        $queryu = "SELECT `id` FROM `pwdlogin` WHERE username = '".$_POST['username']."'";
        $resultu = mysqli_query($link, $queryu);
        $uid = mysqli_fetch_array($resultu);
        if (!isset($uid)){
            echo "<p><div class='alert alert-danger' align='right' role='alert'>
                That username doesn't exist!
            </div></p>"; 
        }
        else{
        //check if security questions match, compare with the previous password    
            $querypwd = "SELECT `password` FROM `pwdlogin` WHERE `id` = '".$uid[0]."'";
            $resultpwd = mysqli_query($link, $querypwd);
            $cpwd = mysqli_fetch_array($resultpwd); 
            
            $querysq1 = "SELECT `sq1` FROM `pwdlogin` WHERE `id` = '".$uid[0]."'";
            $resultsq1 = mysqli_query($link, $querysq1);
            $csq1 = mysqli_fetch_array($resultsq1);
            
            $querysq2 = "SELECT `sq2` FROM `pwdlogin` WHERE `id` = '".$uid[0]."'";
            $resultsq2 = mysqli_query($link, $querysq2);
            $csq2 = mysqli_fetch_array($resultsq2);
            
            if(($_POST['sq1'] == $csq1[0]) and ($_POST['sq2'] == $csq2[0])){
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                if(password_verify($_POST['password'], $cpwd[0])){
                    echo "<p><div class='alert alert-danger' align='right' role='alert'>
                New password can't be the same as old password!
            </div></p>"; 
                }
                else{
                //encrypt and set new password
                    
                $queryed = "UPDATE `pwdlogin` SET `password` = '".$hashed_password."' WHERE `id` = '".$uid[0]."'";
                $resulted = mysqli_query($link, $queryed);
                echo "<div class='alert alert-success' align='right' role='alert'>
                    Password Changed Successfully!
                    </div>";
                echo "<script>
                setTimeout(function(){
                window.location.href = 'login.php';
                }, 1000);
                </script>";
                }
                
            }
            //security questions are wrong
            else {
                echo "<div class='alert alert-danger' align='right' role='alert'>Answer the Questions correctly</div>";
            }
                
                
                
            }
            
    

}






?>










