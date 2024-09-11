<?php
session_start();

if ($_SESSION["LOGGEDIN"] == "TRUE"){

?>

            <?php


            // Let's create a connection to our database:
            // Set up database connection parameters   
            $servername = "localhost:3306";
            $db = "IA";
            $username = "phpuser";
            $password = "phpuser";

        // Open connections late
            $conn = new mysqli($servername, $username, $password, $db);
            // Check connection
            if ($conn->connect_error) {
                // Something went wrong
                die("Connection failed: " . $conn->connect_error);
            }





            ?>
<?php
$id2 = $_SESSION["ID"];

?>  
    
    <?php

$duration = filter_input(INPUT_POST, 'duration');    //failed attempt at storing information to do with
$excuse = filter_input(INPUT_POST, 'excuse');        //the inactivity form
$test = false;
if (isset($_POST['write'])){
    $duration = $_POST['duration'];
    $excuse = $_POST['excuse'];
    $test = true;
                                                              
}
if ($test == true){
                  
    $sql = "INSERT INTO excuseForm (durationExcused, reason, docentID) VALUES ('$duration', '$excuse', '$id2')";
        if ($conn->query($sql)){
            echo "<p>Data entered successfully ...</p>";
            //header("location:homepage.php");
            
        }    
    else {
        echo"<p>Data wasn't registered</p>";
    }
}
else {
    
}



?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        
            <meta charset="UTF-8">
            <title>


    .header {
      height: 50px;
      width: 50%;
      padding: 10px;
    }             


     </title>           
            <style>
    
     body {
      background-image: url('watercolour.jpg');;
    }   
                
                
                
                .column {
      float: left;
      width: 50%;
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

        






            </style>           


<?php

?>






        
        <body>
          <div class="header">
             <h1 style="text-align:center">Welcome, please update your progress</h1>  
             <?php
            //echo "<p>Hello, ".$_SESSION["firstname"]."</p>";
          ?>
             </div>  








                <div class="row">    <?php //where user can click to input tour details?> 
      <div class="column">
        <h3>Fill in details about your most recent tour</h3>
        <form action="tourDetailsForm.php" method="POST">

                <input type="submit" value="Go">
    </form>  


            </div>

      <div class="column">
        <h3>Excuse for inactivity Form</h3>    <?php //when user wants to be on leave they can show inactivity?>
        <form method="POST">

                <label for="duration">Duration of leave:</label>
                <input type="text" name="duration" placeholder="3 months"required><br><br>
                <label for="reason">Reason of leave:</label> <br>
        <textarea id="excuse" name="excuse" rows="7" cols="60"required>
        </textarea><br>
                <input type="submit" value="Submit" name="write">

        </form>  


            </div>              

                </div>

        </body>
    </html>
<?php
}

else{
    header("location:index.php");
}
?>
