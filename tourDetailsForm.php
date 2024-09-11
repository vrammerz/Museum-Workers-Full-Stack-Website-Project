    <?php
// Let's create a connection to our database:
        // Set up database connection parameters
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
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        $venue = filter_input(INPUT_POST, 'museum');
        $type = filter_input(INPUT_POST, 'type');
        $language = filter_input(INPUT_POST, 'language');
        $days = filter_input(INPUT_POST, 'days');   
        $month = filter_input(INPUT_POST, 'month'); 
        $year = filter_input(INPUT_POST, 'year'); 
        $hour = filter_input(INPUT_POST, 'hour'); 
        $minute = filter_input(INPUT_POST, 'minute'); 
        $ampm = filter_input(INPUT_POST, 'ampm'); 
        $noOfPpl = filter_input(INPUT_POST, 'numOfPpl');
        
        $sql = "SELECT ID FROM venues WHERE venueName = '$venue'";
   $results = $conn->query($sql);
   if($results->num_rows>0){
       $venueID = row['ID'];
   }
        
   $aydi = $_SESSION["ID"];     
   if (isset($_POST['Submit'])){
          $sql = "INSERT INTO tourDetails (venue, type, language, day, month, year, hour, minute, ampm, noOfPpl, venueID, docentID) "
                . "VALUES ('$venue', '$type', '$language', '$days', '$month', '$year', '$hour', '$minute', '$ampm', '$noOfPpl', $venueID, '$aydi')";
        if ($conn->query($sql)){
            echo "<p>Data entered successfully ...</p>";
        }  
     else {echo "<p>Data couldn't transfer</p>";}       
            
            
            
            
        }
        
        ?>






<html>
    <head>
        <meta charset="UTF-8">
        <title>
          .header {
 
  width: 50%;
  background-color: Yellow;
}  
            
        </title>
        <style>
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
            
            
<style>
        body {
  background-image: url('watercolour.jpg');;
}    
            
            
            
        </style>            
            
            
        </style>
    
    
    
    
    
    
    
    </head>
    <body>
<div class="header">
         <h1 style="text-align:center">Tour Details Form</h1>  
         </div>
        
        
        
        
        
<div class="row">
  <div class="column">        
      <h3>Museum:</h3>  
      <form action="tourDetailsForm.php" method="POST">
  <input type="radio" name="museum" value="IHC">
  <label for="male">IHC</label><br>
  <input type="radio" name="museum" value="Peranakan Museum">
  <label for="female">Peranakan Museum</label><br>
  <input type="radio" name="museum" value="ACM">
  <label for="other">ACM</label><br>
 <input type="radio" name="museum" value="MHC">
 <label for="other">MHC</label><br> 
 <input type="radio" name="museum" value="NMS">
 <label for="other">NMS</label><br>
 <input type="radio" name="museum" value="Gilman Barracks">
 <label for="other">Gilman Barracks</label><br> 
 <input type="radio" name="museum" value="STPI">
 <label for="other">STPI</label><br>
 <input type="radio" name="museum" value="SAM">
 <label for="other">SAM</label><br>
  <input type="radio" name="museum" value="SYP">
 <label for="other">SYP</label><br>
</form>    
</div>
    
  
    
    
<div class="column">
<h3>What type of tour:</h3>  
      <form>
  <input type="radio" id="male" name="type" value="Public">
  <label for="male">Public</label>
  <input type="radio" id="female" name="type" value="Adult">
  <label for="female">Adult</label>
  <input type="radio" id="other" name="type" value="School">
  <label for="other">School</label>
 <label for="other">Other:</label>
  <input type="textbox" id="other" name="type" value="">
 
      
<h3>What language:</h3>  
      
  <input type="radio" id="male" name="language" value="English">
  <label for="male">English</label>
  <input type="radio" id="female" name="language" value="Malay">
  <label for="female">Malay</label>
  <input type="radio" id="other" name="language" value="Chinese">
  <label for="other">Chinese</label>
  <input type="radio" id="other" name="language" value="Tamil">
  <label for="other">Tamil</label>
 
      

  
      
    
          <label for="male"><h3>Date:</h3></label>
  
  <!-- A label -->
            
            
            <!-- A text box -->
            <input type="text" name="day" placeholder="Day">
            <label for="male">/</label>
 <input type="text" name="month" placeholder="Month">
 <label for="male">/</label>
 <input type="text" name="year" placeholder="Year">
      

    
    
          <label for="male"><h3>Time:</h3></label>
  
  <!-- A label -->
            
            
            <!-- A text box -->
            <input type="text" name="hour" placeholder="Hour">
            <label for="male">:</label>
 <input type="text" name="minute" placeholder="Minute">
 <input type="radio" id="other" name="ampm" value="ACM">
  <label for="other">AM</label>
  <input type="radio" id="other" name="ampm" value="ACM">
  <label for="other">PM</label><br><br>   
  </div>   
      <div class="column">
        
 <label for="male">How many people:</label>       
 <input type="text" name="numOfPpl"><br><br>       
          
  <input type="submit" value="Submit">
 </div>   
      
      </form>
    

    
</div>

        
        <?php
       
        ?>
    </body>
</html>
