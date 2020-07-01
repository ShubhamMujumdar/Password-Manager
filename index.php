
<html lang="en">
    <head>
        <title>Password Manager</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="icon" href="password.png">
        <style>
            .bg { 
                background: url(bg.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: 100%;
                height:100%;
              
            }
            #title {
                
                color: white;
                font-family: 'Julius Sans One', sans-serif;

                
            }
            #caption {
                margin-top:16%;
                text-align: center;
                color: white;
                font-family: 'Tangerine', cursive;
                font-size: 300%;
            }
            #about { 
                background: url(matrix.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: 100%;
                height:100%;
              
            }
            #abouttitle {
                font-family: 'Roboto', sans-serif;
                color:white;
                text-align:center;
            }
            .album {
                background-color:black;
            }
            #arrow {
                margin-left:94%;
                margin-bottom:0px;
            }
            #button2:hover span {display:none}
            #button2 {
                width: 200px;
            }
            #button2:hover:before {content:"Log out"}
            
            
        </style>
        
    </head>
    <body>
        <div class="bg">
        <div class="navbartop">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" id="title" href="#">Password Manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="/developer">Developer</a>
            </li>-->
            <?php
            session_start();
            if (isset($_SESSION["id"])){
                echo '<li class="nav-item">
                <a class="nav-link" href="home.php">Your profile</a>
            </li>';
            }
            ?>
            
            </ul>
            <?php
            session_start();
            if (!isset($_SESSION["id"])){
        echo '<a href="login.php"><button type="button" class="btn btn-outline-light">Log In</button></a> 
              <a href="signup.php"><button type="button" class="btn btn-outline-light" style="margin-left: 4px;" href="signup.php">Sign Up</button></a>';
    
                }
            else {
                    $link = mysqli_connect("shareddb-t.hosting.stackcp.net", "mujumdarshubham", "d.r.a.g.o.n.", "collegekids-313331a8e8");
                    $namequery = "SELECT `name` FROM `pwdlogin` WHERE `id` = '".$_SESSION["id"]."'";
                    $nameresult = mysqli_query($link, $namequery);
                    $name = mysqli_fetch_array($nameresult);
                    echo "<a class='nav-link' href='/logout.php'><button type='button' class='btn btn-outline-light' id='button2'><span> Logged in as " . $name[0] . "</span></button></a>";
        
                }
    
    ?>
            
        </div>
        </nav>
        </div>
        
        <p id="caption">A place for all your passwords. As safe as it could be.</p>
        
    </div>
    <div id="about">
        <br>
        <h1 id="abouttitle">How Password Manager Works</h1>
        <br>
         <div class="album py-5" class="album">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="socialmedia.jpeg" width="100%" height="100%"></svg>
            <div class="card-body">
              <p class="card-text">Finding it difficult to remember all your passwords from your different social media accounts?</p>
              <div class="d-flex justify-content-between align-items-center">
              
                <small class="text-muted">Also applies to corporate passwords, bank details and other confidential passwords.</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
           <img src="hacker.png" height="100%" width="100%">
            <div class="card-body">
              <p class="card-text">Afraid of hackers finding your passwords out and accessing your personal information?</p>
              <div class="d-flex justify-content-between align-items-center">
            
                <small class="text-muted">Password Manager provides industrial level of security with multiple layers of encryption.</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="happy.jpg" height="100%" width="100%">
            <div class="card-body">
              <p class="card-text">Password Manager takes care of all that, so you can use the internet without worrying about anything!</p>
              <div class="d-flex justify-content-between align-items-center">
               
                <small class="text-muted">One safe place with all your passwords. Hassle-free, safe, perfect! </small>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        <a href="#"><img src="arrowup.ico" id="arrow" height="50px"></a>
    </div>
    </body>
</html>