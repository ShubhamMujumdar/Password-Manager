
<html lang="en">
<head>
    <title>Login Error</title>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="icon" href="password.png">
    <style>
        #title {
                
                color: white;
                font-family: 'Julius Sans One', sans-serif;

                
            }
        .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 25%;
                height:50%;
            }
        .right {
                text-align: right;
            }
            .button1:hover span {display:none}
            .button1 {
                width: 200px;
            }
            .button1:hover:before {content:"Log out"}
    </style>


</head> 

<body style="background-color: black">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-none">
  <a class="navbar-brand" href="index.php" id="title">Password Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/home.php">Your Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Strong Password Guide</a>
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
                        echo '<a href="login.php"><button type="button" class="btn btn-outline-light">Log In</button></a>
                        <a href="signup.php"><button type="button" class="btn btn-outline-light" style="margin-left: 4px;" href="signup.php">Sign Up</button></a>';
                        
                    }
        
                ?>
            </li>
            </ul>
    
  </div>
</nav>

<div>

<h3 style="margin-left:30%; margin-top: 5%; color: white;">The guide to setting a strong password</h3><br><br>

    <ol style="color:white; margin:auto; width:60%; padding:5px">
        <li>Make sure your password is <strong>larger than 7 characters</strong>. Longer passwords are harder to crack.</li>
        <li>Make sure your password contains <strong>alphabets, numbers and special characters</strong>. A combination of these three makes your password harder to decrypt.</li>
        <li>Make sure your password <strong>doesn't contain personal information</strong> like names of you or your loved ones, or important dates. These are easy to guess.</li>
        <li>Make sure you have <strong>different passwords for different platforms</strong>, so if even one of them gets compromised, all of them don't.</li>
        <li>Don't write down your password in an easily accessible place (like the back of your mousepad). Many passwords get compromised by people who accidentally stumble upon them.</li>
        <li>The more random your password, the better it is!</li>
        
    </ol><br>
    <p style="color:white; margin:auto; width:60%; padding:5px">It's okay if the passwords get a little hard to remember... That's what we're here for!</p>

</div>   
    
</body>
</html>

