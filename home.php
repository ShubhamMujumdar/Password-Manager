<?php
session_start();
//started the session so the session variables work
?>

<html lang="en">
    <head>
        <title>Password Manager</title>
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:wght@300&family=Tangerine&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="icon" href="password.png">
        <script src="https://code.jquery.com/jquery-3.x-git.min.js"></script>
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
            #right {
                border-left: 1px solid white;
            }
            #labelcenter {
                text-align: center;
            }
            th{
                text-align: center;
            }
            td{
                text-align: center;
            }
            #tt {
                visibility:hidden;
            }
            #tt2 {
                visibility:hidden;
            }
            #random1 {
                visibility:hidden;
            }
            #random2 {
                visibility:hidden;
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
            <li class="nav-item">
                <a class="nav-link" href="passwordguide.php">Strong Password Guide</a>
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
                    
                    $sqlname = "SELECT `name` FROM `names`";
                    $resultname = mysqli_query($link, $sqlname);
                    $names = array();
                    while ($rowname = mysqli_fetch_array($resultname)) {
                        $names[] = $rowname['name'];
                    }
        
                ?>
            </li>
            </ul>
            
        </div>
        </nav>
        </div>
        
        <div class="row">
            
            <div class="column" align="center">
                <?php
                
                include 'key.php';
                
                $result = mysqli_query($link,"SELECT * FROM pwddata WHERE login_id='".mysqli_real_escape_string($link, $_SESSION["id"])."'");
                echo "<br><br><table class='table-dark table-striped' id='editableTable' border='1' width='90%'>
                    <tr>
                    <th>Platform</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th id='labelcenter'>Action</th>
                    </tr>";
    
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row['platform'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . openssl_decrypt($row['password'], 'AES-256-CBC', $key) . "</td>";
                    echo "<td><form method='post' style='height:25px' autocomplete='off'><button type='submit' name='edit' value=" .$row['id']." id='edit' class='btn btn-success' style='margin-top:5px'><img src='edit.ico' height='15px'></button>
                    <button type='submit' name='delete' value=".$row['id']." id='delete' class='btn btn-danger' style='margin-top:5px'><img src='delete.png' height='15px'></button></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                if (isset($_POST['edit'])){
                    $resultedit = mysqli_query($link,"SELECT * FROM pwddata WHERE id='".mysqli_real_escape_string($link, $_POST["edit"])."'");
                    $rowedit = mysqli_fetch_array($resultedit);
                    $platformedit = $rowedit["platform"];
                    $usernameedit = $rowedit["username"];
                    $passwordedit = $rowedit["password"];
                    $_SESSION['idedit'] = $_POST['edit'];
                    
                    
                }
                
                if (isset($_POST['delete'])){
                    $resultdelete = mysqli_query($link, "DELETE FROM pwddata WHERE id='".mysqli_real_escape_string($link, $_POST['delete'])."'");
                    echo "<div class='alert alert-success' role='alert'>
                        Data deleted successfully!
                        </div>";
                    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                }
                
                ?>
                
            
            </div>
        
                
            <div class="column" style="padding:20px;" id="right">
            
            <div class="row">
          <div class="col-lg-6">
            <div class="bs-component">
              <form method="post">
                <fieldset>
                <?php 
                include 'key.php';
                
                if (!isset($_POST["edit"])){
                 echo '<form name="add" autocomplete="off"><legend style="color:white">Add new account</legend>
                
                
                  
                  <div class="form-group">
                    <label for="platform" style="color:white">Platform</label>
                    <input type="text" class="form-control" autocomplete="off" id="platform" required name = "platform" aria-describedby="plHelp" placeholder="Enter platform">
                    <small id="plHelp" class="form-text text-muted">Eg: Facebook, Twitter, Reddit, etc.</small>
                  </div>
                  
                  <div class="form-group">
                    <label for="username" style="color:white">Username</label>
                    <input type="text" class="form-control" required id="username" autocomplete="off" name="username" aria-describedby="unHelp" placeholder="Enter username">
                    <small id="unHelp" class="form-text text-muted">We will never share your details with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password" style="color:white">Password<a href="#" id="texttt" data-toggle="tooltip"><img src="error.png" style="margin-left:10px" id="tt" class="tt" height="17px"></a></label>
                    <input type="text" class="form-control" required id="password" autocomplete="off" onblur="clear()" onfocus="generatepassword()" oninput="strengthcheck()" name="password" placeholder="Password">
                    <small id="warning1" style="color:red; visibility:hidden">Please set this password in the original platform as well.</small>
                  </div>
                  <div class="alert alert-info" role="alert" id="random1">
                        
                  </div>
                  <button type="submit" class="btn btn-primary">Add</button></form>';
                  
                  
                  
                  }
                else {
                    $result = mysqli_query($link,"SELECT * FROM pwddata WHERE id='".$POST['edit']."'");
                    $row = mysqli_fetch_array($result);
                    
                    
                    
                    echo '<form name="edit" autocomplete="off"><legend style="color:white">Edit entry</legend>
                
                
                  
                  <div class="form-group">
                    <label for="platforme" style="color:white">Platform</label>
                    <input type="text" class="form-control" id="platforme" name = "platforme" required aria-describedby="plHelp" value="'.$platformedit.'">
                    <small id="plHelp" class="form-text text-muted">Eg: Facebook, Twitter, Reddit, etc.</small>
                  </div>
                  
                  <div class="form-group">
                    <label for="usernamee" style="color:white">Username</label>
                    <input type="text" class="form-control" id="usernamee" required name="usernamee" aria-describedby="unHelp" value="'.$usernameedit.'">
                    <small id="unHelp" class="form-text text-muted">We will never share your details with anyone else.</small>
                  </div>
                  <div class="form-group">
                  
                    <label for="passworde" style="color:white">Password<a href="#" data-toggle="tooltip" id="texttt2"><img src="error.png"  id="tt2" style="margin-left:10px" height="17px"></a></label>
                    <input type="text" class="form-control" required id="passworde" onblur="clear2()" oninput="strengthcheck2();namecheck2();" onfocus="generatepassword2()" name="passworde" value="'.openssl_decrypt($passwordedit, 'AES-256-CBC', $key).'">
                    <small id="warning2" style="color:red; visibility:hidden">Please set this password in the original platform as well.</small>
                    <div class="alert alert-info" role="alert" id="random2">
                        
                    </div>
                  
                  </div>
                  <button type="submit" class="btn btn-success">Save</button>
                  <a href="home.php"><button type="button" class="btn btn-danger">Cancel</button></a></form>';
                  
                
                    
                }
                
                ?>
                </fieldset>
              </form>
            </div>
          </div>
          </div>  
          <script>
          
            var normalnames =<?php echo json_encode($names );?>;
            names = normalnames.toLocaleString().toLowerCase().split(',');
            //var passwordsmall=document.getElementById("password").value.toLowerCase(Locale.US);
            
            var text = "";
            
            function generatepassword(){
                
                text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$#*&@!%^+-/";
                var number="0123456789";
                var special="!@#$%^&*()-=+_/";

                for (var i = 0; i < 5; i++){
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                    text += number.charAt(Math.floor(Math.random() * number.length));
                    text += special.charAt(Math.floor(Math.random() * special.length));
                    }
               
                
                document.getElementById("random1").style.visibility="visible"
                document.getElementById("random1").innerHTML="<small>Suggested strong password: <a href='javascript: populate1()'>"+text+"</a></small>";
                document.getElementById("warning1").style.visibility="hidden"
                
            }
            
            function generatepassword2(){
                
                text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$#*&@!%^+-/";
                var number="0123456789";
                var special="!@#$%^&*()-=+_/";

                for (var i = 0; i < 5; i++){
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                    text += number.charAt(Math.floor(Math.random() * number.length));
                    text += special.charAt(Math.floor(Math.random() * special.length));
                    }
               
                
                document.getElementById("random2").style.visibility="visible"
                document.getElementById("random2").innerHTML="<small>Suggested strong password: <a href='javascript: populate2()'>"+text+"</a></small>";
                document.getElementById("warning2").style.visibility="hidden"
                
            }
            
            function populate1(){
                document.getElementById("password").value=text;
                document.getElementById("warning1").style.visibility="visible"
            }
            function populate2(){
                document.getElementById("passworde").value=text;
                document.getElementById("warning2").style.visibility="visible"
            }
            
            function clear(){
                document.getElementById("random1").style.visibility="visible"
            }
            
            function clear2(){
                document.getElementById("random2").style.visibility="visible"
            }
            
            
            
            
            
          
          
          
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            });
            
            
        
        
        var spchar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/
        var hasNumber = /\d/;
     
        
       
                
        function strengthcheck() {    
            if (document.getElementById("password").value.length>5){
                if (hasNumber.test(document.getElementById("password").value) == true) {
                    if (spchar.test(document.getElementById("password").value)== true) {
                        
                        
                        document.getElementById("tt").style.visibility = "hidden";
                        
                        
                    }
                    else {
                        document.getElementById("texttt").setAttribute("title", "Password should contain special characters")
                        document.getElementById("tt").style.visibility = "visible";
                    }
                
                }
                else {
                    if (spchar.test(document.getElementById("password").value) == true) {
                        document.getElementById("texttt").setAttribute("title", "Password should contain numbers")
                        document.getElementById("tt").style.visibility = "visible";
                        
                    }
                    else {
                        document.getElementById("texttt").setAttribute("title", "Password should contain numbers and special characters")
                        document.getElementById("tt").style.visibility = "visible";
                    }
                }
            }
            
            
            else {
                        document.getElementById("texttt").setAttribute("title", "Password is too short")
                        document.getElementById("tt").style.visibility = "visible";
            }
        }
        
        function strengthcheck2(){
            if (document.getElementById("passworde").value.length>5){
                if (hasNumber.test(document.getElementById("passworde").value) == true) {
                    if (spchar.test(document.getElementById("passworde").value)== true) {
                        //strong
                        document.getElementById("tt2").style.visibility = "hidden";
                        
                    }
                    else {
                        document.getElementById("texttt2").setAttribute("title", "Password should contain special characters")
                        document.getElementById("tt2").style.visibility = "visible";
                    }
                
                }
                else {
                    if (spchar.test(document.getElementById("passworde").value) == true) {
                        document.getElementById("texttt2").setAttribute("title", "Password should contain numbers")
                        document.getElementById("tt2").style.visibility = "visible";
                        
                    }
                    else {
                        document.getElementById("texttt2").setAttribute("title", "Password should contain numbers and special characters")
                        document.getElementById("tt2").style.visibility = "visible";
                    }
                }
            }
            
            
            else {
                        document.getElementById("texttt2").setAttribute("title", "Password is too short")
                        document.getElementById("tt2").style.visibility = "visible";
            }
            
        }
    
          </script>
          
          
          
                
            
            <?php
            
            include 'key.php';
            if (array_key_exists('platform', $_POST) or array_key_exists('username', $_POST) or array_key_exists('password', $_POST)) {
                //echo "<p style='margin-left:75%; color:white;'>Hi</p>";
                    $encryptionMethod = "AES-256-CBC"; 
                    
                    $encryptedpassword = openssl_encrypt($_POST['password'], $encryptionMethod, $key);
                
                    $query = "INSERT INTO `pwddata` (`login_id`, `platform`, `username`, `password`) VALUES ('".mysqli_real_escape_string($link, $_SESSION["id"])."', '".mysqli_real_escape_string($link, $_POST['platform'])."', '".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $encryptedpassword)."')";
                    $result = mysqli_query($link, $query);
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
                        Data entered successfully!
                        </div>";
                    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
            
                    
                }
             
             if (array_key_exists('platforme', $_POST) or array_key_exists('usernamee', $_POST) or array_key_exists('passworde', $_POST)) {
                //echo "<p style='margin-left:75%; color:white;'>Hi</p>";
                
                    $encryptionMethod = "AES-256-CBC"; 
                    
                    $encryptedpassworde = openssl_encrypt($_POST['passworde'], $encryptionMethod, $key);
                    
                    $queryed = "UPDATE `pwddata` SET `platform` = '".$_POST['platforme']."', `username` = '".$_POST['usernamee']."', `password` = '".$encryptedpassworde."' WHERE `id` = '".$_SESSION['idedit']."'";
                    $resulted = mysqli_query($link, $queryed);
                    echo "<div class='alert alert-success' role='alert'>
                        Data editted successfully!
                        </div>";
                    unset($_SESSION['idedit']);
                    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                    
                    
                    
                    
            
                    
                }
                   
            
            ?>
            
            </div>
            </div>
   
        
    </body>
    
    
    
    
</html>