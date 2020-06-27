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
        </style>
        
    </head>
    
    <body style="background-color:black">
        <div class="navbartop">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" id="title" href="#">Password Manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="developer.php">Developer</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Your profile:)<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item" class="right">
                <?php
                    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
                    if (isset ($_SESSION["id"])){
                        $namequery = "SELECT `name` FROM `pwdlogin` WHERE `id` = '".$_SESSION["id"]."'";
                        $nameresult = mysqli_query($link, $namequery);
                        $name = mysqli_fetch_array($nameresult);
                        echo "<p style='color: white;'> Logged in as " . $name[0] . "</p>";
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
        
        
    </body>
    
    
    
    
</html>