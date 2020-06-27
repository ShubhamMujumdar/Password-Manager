
<html lang = "en">
    <head>
        <title>Log In!</title>
        <style type = "text/css">
            body {
                font-family: "Lato", sans-serif;
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
                    margin-top: 60%;
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
        
    </head>

<body>
    
    
    
  
<div class="sidenav">
         <div class="login-main-text">
            <h2>Password Manager<br> Login</h2>
            <p>Login or sign up from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <a href="/index.php"><img src="homeicon24.png" style="margin-left: 670px;"></a>
            <div class="login-form">
               <form method="post">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  </form>
                  <br>
                  <a href="signup.php"><button type="button" class="btn btn-success">Sign Up</button></a>
                  <br>
                  <p> (Sign up if you haven't before:)) </p>
               
            </div>
         </div>
      </div>
      
    </body>  
</html>

<?php

session_start();
if (array_key_exists('username', $_POST) or array_key_exists('password', $_POST)) {
    
    
    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "taskround-3134378848");
    if (mysqli_connect_error()) {
    
    die ("There was an issue with connecting to the database.");
    
    }
    
    if ($_POST['username'] == '' or $_POST['password'] == '') {
        
        echo "<div class='alert alert-danger' role='alert'>
                Fill in all the details to log in
            </div>";
    }
    else {
        $queryu = "SELECT `id` FROM `signin_data` WHERE username = '".$_POST['username']."'";
        $resultu = mysqli_query($link, $queryu);
        $uid = mysqli_fetch_array($resultu);
        if (!isset($uid)){
            echo "<p style='margin-left: 550px; '><font color=red>That username doesn't exist, Sign up.</font></p>"; 
        }
        else{
            $queryp = "SELECT `password` FROM `signin_data` WHERE `id` = '".$uid[0]."'";
            $resultp = mysqli_query($link, $queryp);
            $p = mysqli_fetch_array($resultp);
            if ($p[0] == $_POST['password']){
                $_SESSION["id"] = $uid[0];
                echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                
            }
            else {
                echo "<p align = 'center'><font color=red>Password is incorrect.</font></p>";
            }
        }
    }

}






?>










