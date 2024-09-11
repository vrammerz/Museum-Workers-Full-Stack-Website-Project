<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.    
-->

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
 



<?php
$test = false;
if (isset($_POST['delete'])){
    $deleteFirstNameUser = $_POST['dfname']; 
    $deleteLastNameUser = $_POST['dlname'];       
    $test = true;
    echo "test is true";
}   
$deleteFirstNameUser = strval($deleteFirstNameUser);
$deleteLastNameUser = strval($deleteLastNameUser);
if ($test == true){
    $sql = "DELETE FROM Docents WHERE FirstName ='$deleteFirstNameUser' AND LastName ='$deleteLastNameUser'";
    if ($conn->query($sql)){
            echo "<p>Data deleted successfully ...</p>";
        }     
else {
    echo "<p>Error, member wasn't found</p>";

     }     
}
?>




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
  background-image: url('watercolour.jpg');;
}                
            
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}





/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}            
            
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }            
   
        
        </style>
    
    
    
    
    
    
    </head>
    <body>
    
    
    <div class="header">
         <h1 style="text-align:center">Welcome Admin, please monitor docents regularly</h1>  
         </div>
        
<div class="row">
  <div class="column">
    <p>View records of docent progress</p>                      <?php//view docent progress by typing in 
    <form action="docentRecords.php" method="POST">                   //first and last name ?>
       <label for="fname">First name:</label>                              
            
            <!-- A text box -->
            <input type="text" name="fname" placeholder="e.g. John"required><br><br>
            
            <!-- A label -->
            <label for="sname">Second name:</label>
            
            <!-- A text box -->
            <input type="text" name="sname" placeholder="e.g. Smith"required><br><br>                      
            
        
        <input type="submit" value="Go">
</form>  
  <p>View any potential excuses for inactivity</p>
  <form action="excusesPage.php" method="POST">
                             
            <input type="submit" value="Go">
</form>  
  
  
  
  
  
  </div>
  
  <div class="column">                                          
    <h2>Add a docent:</h2>                                           <?php//add a docent to the database?>
    <form action="adminPage.php" method="POST">
            <!-- A label -->
            <label for="fname">First name:</label>
            
            <!-- A text box -->
            <input type="text" name="fname" placeholder="e.g. John"required><br><br>
            
            <!-- A label -->
            <label for="sname">Second name:</label>
            
            <!-- A text box -->
            <input type="text" name="sname" placeholder="e.g. Smith"required><br><br>
            
            <!-- A label -->
            <label for="username">Username:</label>
            
            <!-- A text box -->
            <input type="text" name="username" placeholder="rambo226"required><br><br>
            
            <!-- A label -->
            <label for="password">Password:</label>
            
            <!-- A text box -->
            <input type="password" name="password" placeholder="secret"required><br><br>
            
            <!-- A button -->
            <input type="submit" value="Submit">
        </form>

<?php
// Get the form field from the previous page
        $firstName = filter_input(INPUT_POST, 'fname');
        $lastName = filter_input(INPUT_POST, 'sname');
        $userName = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if (isset($firstName)){
            

// Set up our SQL statement to INSERT new data:
        $sql = "INSERT INTO Docents (FirstName, LastName, UserName, Password) "
                . "VALUES ('$firstName', '$lastName', '$userName', '$password')";
        if ($conn->query($sql)){
            echo "<p>Data entered successfully ...</p>";
        }
    }                                         
        ?>  
  
  
  
  
  
  
  </div>
  
  <div class="column">
    <h2>Delete a docent</h2>
    <form action="adminPage.php" method="POST">        
        <!-- A label -->
            <label for="dfname">First name of docent to delete:</label>
            
            <!-- A text box -->
            <input type="text" name="dfname" placeholder="e.g. John"required><br><br>
            
            <label for="dlname">Last name of docent to delete:</label>
            
            <!-- A text box -->
            <input type="text" name="dlname" placeholder="e.g. Proctor"required><br><br>
        
        <input type="submit" value="delete" name = "delete">
            
    </form>
  
  </div>

    <div>
        <h3>View docents that have done less than the minimum number of tours</h3>
        <form action="minRecTable.php" method="POST">
        <input type="submit" value="enter" name = "Go">
        </form>
        
        
        
    </div>



</div>

        <div>
            <h3>Most active docents:</h3>    
        <table>
  <tr>
    <th>Docent</th>
    <th>No. of tours</th>
  </tr>
  <tr>
    <td>$docent[$totalDocents]</td>
    <td>$totalnum[$totalDocents]</td>
    
  </tr>
  <tr>
    <td>$docent[$totalDocents-1]</td>
    <td>$totalnum[$totalDocents-1]</td>
    
  </tr>
  <tr>
    <td>$docent[$totalDocents-2]</td>
    <td>$totalnum[$totalDocents-2]</td>
    
  </tr>

</table>
    
                  
        </div>
    
    
    
    
    </body>

</html>

<?php 
$sql = "SELECT COUNT (*) FROM Docents";
$result = $conn->query($sql);
$totalDocents = $result;    

for ($i = 1; $i < $totalDocents+1; $i++)  {
$sql = "SELECT COUNT (*) FROM TourDetails WHERE DocentID == i";
$result = $conn->query($sql);
$totalnum[i] = $result;
$sql = "SELECT FirstName & LastName FROM Docents WHERE ID == i";
$result = $conn->query($sql);
$docent[i] = $result;
if (  $totalnum[i]<12   )
{
 $_SESSION('MinRecTableNum')[i] = $totalnum[i];
 $_SESSION('MinRecTableName')[i] = $docent[i];
         
}

}


?>




<?php 
// PHP implementation of Radix Sort  
// A function to do counting sort of arr[]  
// according to the digit represented by exp.  
function countSort(&$totalnum, $totalDocents, $exp)  
{  
    $output = array_fill(1, $totalDocents, 0); // output array  
    $count = array_fill(0, 10, 0);  
  
    // Store count of occurrences in count[]  
    for ($i = 1; $i < $totalDocents+1; $i++)  
        $count[ ($totalnum[$i] / $exp) % 10 ]++;  
  
    // Change count[i] so that count[i]  
    // now contains actual position of  
    // this digit in output[]  
    for ($i = 1; $i < 10; $i++)  
        $count[$i] += $count[$i - 1];  
  
    // Build the output array  
    for ($i = $totalDocents - 1; $i >= 0; $i--)  
    {  
        $output[$count[ ($totalnum[$i] /  
                         $exp) % 10 ] - 1] = $totalnum[$i];  
        $count[ ($totalnum[$i] / $exp) % 10 ]--;  
    }  
  
    // Copy the output array to arr[], so  
    // that arr[] now contains sorted numbers 
    // according to current digit  
    for ($i = 0; $i < $totalDocents; $i++)  
        $totalnum[$i] = $output[$i];  
}  
  
// The main function to that sorts arr[]  
// of size n using Radix Sort  
function radixsort(&$totalnum, $totalDocents)  
{  
      
    // Find the maximum number to know 
    // number of digits  
    $m = max($totalnum);  
  
    // Do counting sort for every digit. Note  
    // that instead of passing digit number,  
    // exp is passed. exp is 10^i where i is  
    // current digit number  
    for ($exp = 1; $m / $exp > 0; $exp *= 10)  
        countSort($totalnum, $totalDocents, $exp);  
}  
  
// A utility function to print an array  
function PrintArray(&$totalnum,$totalDocents)  
{  
    for ($i = 0; $i < $totalDocents; $i++)  
        echo $totalnum[$i] . " ";  
}  
    
// Function Call 
radixsort($totalnum, $totalDocents);  
PrintArray($totalnum, $totalDocents);  
?>

