<html lang = "en">
    <head>
        <title>Sign Up!</title>
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
                    margin-top: 40%;
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
    </head>


<div class="sidenav">
         <div class="login-main-text">
            <h2>Password Manager<br> SignUp</h2>
            <p>Sign Up or Log In from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <a href="index.php"><img src="homeicon24.png" style="margin-left: 670px;"></a>
            <div class="login-form">
               <form method="post">
                   <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" placeholder="Name" name="name">
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  
                  <button type="submit" class="btn btn-black">Sign Up</button>
                  </form>
                  
                  <a href="login.php"><button type="button" class="btn btn-success">Log in</button></a>
                  <br>
                  <p> (Log in if you've already signed up) </p>
               
            </div>
         </div>
      </div>
      
</html>

<?php

if (array_key_exists('name', $_POST) or array_key_exists('username', $_POST) or array_key_exists('password', $_POST)) {
    
    //echo "<p style='margin-left:75%;'>Hi</p>";
    //checking if loop is entering
    
    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
    if (mysqli_connect_error()) {
    
    //echo "<p style='margin-left:75%;'>dbconnection error</p>";
    die ("There was an issue with connecting to the database.");
    
    }
    
    
    if ($_POST['name'] == '' or $_POST['username'] == '' or $_POST['password'] == '') {
        
        echo "<div class='alert alert-danger' role='alert' align='right'>
  Please enter all details!
</div>";
    }
    else {
        $query = "SELECT `id` from `pwdlogin` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
        
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0){
            echo "<div class='alert alert-danger' role='alert' align='right'>
  That username has already been taken. Click login, if that's you.
</div>";
        }
    
        else {
            $query = "INSERT INTO `pwdlogin` (`name`, `username`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
            
            if (mysqli_query($link, $query)) {
                
                
                
                $idquery = "SELECT `id` from `pwdlogin` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                $idresult = mysqli_query($link, $idquery);
                $id = mysqli_fetch_array($idresult);
                session_start();
                $_SESSION["id"] = $id[0];
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                
                
                
            }
            else {
                echo "<div class='alert alert-danger' role='alert' align='right'>
  There was a problem signing you up, please try later
</div>";
        }
    }
    }
}



?>
