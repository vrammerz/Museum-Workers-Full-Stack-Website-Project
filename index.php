    <?php
    session_start();
    ?>

<?php
        $servername = "localhost:3306";
        $db = "IA";
        $username = "phpuser";
        $password = "phpuser";

         // Open connections late
        $conn = new mysqli($servername, $username, $password, $db);
        
        if ($conn->connect_error) {
            // Something went wrong
            die("Connection failed: " . $conn->connect_error);
        }
?>



<?php  
    if (isset($_POST['login'])){
        $key = filter_input(INPUT_POST, 'key');
        if ($key == 23688){
             $_SESSION["LOGGEDIN"] = "TRUE";
            header("location:adminPage.php");  
        }
    else { echo "Incorrect Pin";
        $_SESSION["LOGGEDIN"] = "FALSE";
    }
        
        }   

    
$username = filter_input(INPUT_POST, 'userName');
$password = filter_input(INPUT_POST, 'password');
$test = false;
if (isset($_POST['userlogin'])){
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $test = true;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;       
}
$username = strval($username);

// validates user login and matches username and password to a record on the database:
if ($test == true){
   
    $sql = "SELECT * FROM Docents WHERE UserName = '".$username."' AND Password ='". $password."'";
   $results = $conn->query($sql);
   if($results->num_rows>0){
         $_SESSION["LOGGEDIN"] = "TRUE";
         echo "<p>logged in</p>";
         header("location:homepage.php");
         $sql = "SELECT ID FROM Docents WHERE UserName = '$username'";
         $result = $conn->query($sql);
           if ($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
            $_SESSION["ID"] = $row['ID'];    
            }     
           }
         $_SESSION["firstname"] = "SELECT FirstName FROM Docents WHERE UserName = '$username'";
   }
    else 
        {
        $_SESSION["LOGGEDIN"] = "FALSE";
        echo "<p>Incorrect username or password, please try again</p>";}  
       
   }

   
   ?>





<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            .header {
  height: 50px;
  width: 50%;
  background-color: Yellow;
  padding: 10px;
}
        </title>
        <style>
body {
  background-image: url('watercolour.jpg');  //website's background image gotten from google images
}

p.solid {border-style: solid;}
        

div.solid {
    border-style: solid;
    border-width: 2px;
}

 .column {
  float: left;
  width: 33.33%;
  padding: 15px;
}      

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }

        
 /* The navbar container */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Navbar links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Links - change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
  
 div1.solid {border-style: solid;} 
}       
        
        
        
        
        
        
        
        
        
        
        </style>
    
    
    </head>
    
    
    
     <body> 
     
       
         
         
         
         
         <div class="header">
         <h1 style="text-align:center">Home : FOM Database</h1>  
         </div>
     
<div class="topnav">                         //navigation pop up section//
    <a href="index.php">User Login</a>
  <a href="index.php">Admin Login</a>
  <a href="help.php">Help</a>
</div> 
     

         
         
         
         
         
         <div class="row">
  <div1 class="column" class="solid">
      <h2>User Login</h2>
    <form action="index.php" method="POST">   /* form where docent inputs login details */
            <!-- A label -->
            <label for="userName">Username:</label>
            
            <!-- A text box -->
            <input type="text" name="userName" placeholder="e.g. jkr246"><br><br>
            
            <!-- A label -->
            <label for="password">Password:</label>
            
            <!-- A text box -->
            <input type="text" name="password" placeholder="e.g. secret"><br><br>
            
            <!-- A button -->
            <input type="submit" value="Submit" name = "userlogin">
        </form>
        
  
  </div1>
  
        
             <div1 class="column">
    <h2>Admin Login</h2>
    <form action="index.php" method="POST">    //form where admin inputs key to access admin pages where they can
  <!-- A label -->                             //monitor docents
            <label for="key">Key:</label>
            
            <!-- A text box -->
            <input type="integer" name="key"><br><br><br><br>
    
            <input type="submit" value="login" name = "login">
  </form>
  
  
  
  </div1>
  
</div>     
             
     </body>    
</html>

