
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
            
            
            
            
            
            
        </title>
    <style>
        body {
  background-image: url('watercolour.jpg');;
}    
            
p.solid {border-style: solid;}            
            
        </style>
    
    
    
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM excuseForm";
        $ssql = "SELECT * FROM Docents";
        // Using our $conn variable to 'execute' our $sql variable
        // Store the result in our $results variable
        $result = $conn->query($sql);
        $rresult = $conn->query($ssql);
        
        
        while($row = $result->fetch_assoc()) {
            $id = $row["docentID"];
        $aql = "SELECT FirstName FROM Docents WHERE ID = $id";
        $result = $conn->query($aql);
           if ($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
            $fname = $row["FirstName"];    
            }     
           }
            echo '<p class="solid">Name: '.$fname.'<br> Reason: '.$row["reason"].'<br> Duration: '.$row["durationExcused"].'</p><br>';
        }

        ?>
    </body>
</html>

