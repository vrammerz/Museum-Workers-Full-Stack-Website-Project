<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

     
        </style>
    
    </head>
    <body>
        <div>
            <h1>Docent Records Section 2</h1>
<?php  
$sql = "SELECT COUNT (*) FROM TourDetails WHERE DocentID == $_SESSION['ID']";   
$result = $conn->query($sql);
$numTours = $result;

$query = mysql_query("SELECT COUNT (*) FROM TourDetails WHERE DocentID == $_SESSION['ID']";)
while($row = mysql_fetch_array($query))
    {
     $venue[] = $row['venue'];
     $type[] = $row['type'];   
     $language[] = $row['language'];
    $day[] = $row['day'];
     $month[] = $row['mnth'];
     $year[] = $row['year'];
     $hour[] = $row['hour'];
    $minute[] = $row['minute'];
    $ampm[] = $row['ampm'];
     $noOfPpl[] = $row['noOfPpl']; 
    }    
 
for ($i = 0; $i < $numTours; $i++)  {
    echo $venue[i]."<br>".$type[i]."<br>".$language[i]."<br>".$day[i]."<br>".$month[i]."<br>".$year[i].
            "<br>".$hour[i]."<br>".$minute[i]."<br>".$ampm[]."<br>".$noOfPpl[]."<p> People</p><br><br>";    
}                       
?>
</html>
