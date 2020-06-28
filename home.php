<?php
session_start();
?>
<html lang="en">
    <head>
        <title>Password Manager</title>
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
        <style>
            .right {
                text-align: right;
            }
            .button1:hover span {display:none}
            .button1 {
                width: 200px;
            }
            .button1:hover:before {content:"Log out"}
            #title {
                
                color: white;
                font-family: 'Julius Sans One', sans-serif;

                
            }
            .column {
                float: left;
                width: 50%;
            }


            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            #left {
                border-right: 1px solid white;
            }
        </style>
        
    </head>
    
    <body style="background-color:black">
        <div class="navbartop">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" id="title" href="index.php">Password Manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
           
            <li class="nav-item active">
                <a class="nav-link" href="#">Your profile<span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item" class="right">
                <?php
                    session_start();
                    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
                    if (isset ($_SESSION["id"])){
                        $namequery = "SELECT `name` FROM `pwdlogin` WHERE `id` = '".$_SESSION["id"]."'";
                        $nameresult = mysqli_query($link, $namequery);
                        $name = mysqli_fetch_array($nameresult);
                        echo "<a class='nav-link' href='/logout.php'><button type='button' class='btn btn-outline-light button1'><span> Logged in as " . $name[0] . "</span></button></a>";
                    }
                    else {
                        echo "<script type='text/javascript'> document.location = '/loginerror.php'; </script>";
                        
                    }
        
                ?>
            </li>
            </ul>
            
        </div>
        </nav>
        </div>
        
        <div class="row">
            <div class="column" style="padding:20px;" id="left">
            
<div class="row">
          <div class="col-lg-6">
            <div class="bs-component">
              <form style="margin-left:20%;" method="post">
                <fieldset>
                  <legend style="color:white">Add new account</legend>
                  
                  <div class="form-group">
                    <label for="platform" style="color:white">Platform</label>
                    <input type="text" class="form-control" id="platform" name = "platform" aria-describedby="plHelp" placeholder="Enter platform">
                    <small id="plHelp" class="form-text text-muted">Eg: Facebook, Twitter, Reddit, etc.</small>
                  </div>
                  
                  <div class="form-group">
                    <label for="username" style="color:white">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="unHelp" placeholder="Enter username">
                    <small id="unHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password" style="color:white">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Add</button>
                </fieldset>
              </form>
            </div>
          </div>
          </div>    
          
          
                
            
            <?php
            if (array_key_exists('platform', $_POST) or array_key_exists('username', $_POST) or array_key_exists('password', $_POST)) {
                //echo "<p style='margin-left:75%; color:white;'>Hi</p>";
                if ($_POST['platform'] == '' or $_POST['username'] == '' or $_POST['password'] == '') {
        
                    echo "<div class='alert alert-danger' role='alert'>
                        Please enter all details!
                        </div>";
                }
                else {
                    $query = "INSERT INTO `pwddata` (`login_id`, `platform`, `username`, `password`) VALUES ('".mysqli_real_escape_string($link, $_SESSION["id"])."', '".mysqli_real_escape_string($link, $_POST['platform'])."', '".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                    $result = mysqli_query($link, $query);
                    echo "<div class='alert alert-success' role='alert'>
                        Data entered successfully!
                        </div>";
            }
                    
                }
                
            
            ?>
            </div>
            <div class="column" align="center">
                
                <?php
                
                $result = mysqli_query($link,"SELECT * FROM pwddata WHERE login_id='".mysqli_real_escape_string($link, $_SESSION["id"])."')");

                echo "<table class='table-dark' border='1'>
                    <tr>
                    <th>Platform</th>
                    <th>Username</th>
                    <th>Password</th>
                    </tr>";
    
                while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['platform'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
                echo "</table>";
                
                ?>

            </div>
        </div>
        
        
    </body>
    
    
    
    
</html>