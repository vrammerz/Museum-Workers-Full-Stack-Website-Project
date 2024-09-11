<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'A'";
$result = $conn->query($sql);
$ihc = $result        

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'B'";
$result = $conn->query($sql);
$peranakan = $result  
        
$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'C'";
$result = $conn->query($sql);
$acm = $result 

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'D'";
$result = $conn->query($sql);
$mhc = $result 

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'E'";
$result = $conn->query($sql);
$nms = $result 

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'F'";
$result = $conn->query($sql);
$gilmanBaracks = $result 

$sql = "SELECT COUNT (*) FROM TourDetails WHERE docentID = '$_SESSION['ID']' AND venueID = 'G'";
$result = $conn->query($sql);
$stpi = $result         
        
        
?>

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

    @media screen and (max-width:600px) {
      .column {
        width: 100%;
      }           
            
            
        </style>
    </head>
    <body>
        <h1>Docent Record Section 1</h1>

<div class="row"> <div class="column"> <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Museum', 'Number of tours'],
  ['ACM', $acm],
  ['IHC', $ihc],
  ['NMS', $nms],
  ['MHC', $mhc],  
  ['STPI', $stpi],
  ['Gilman Barracks', $gilmanBarracks],
  ['Peranakan Museum', $peranakan]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Tours per museum', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
        
<div>
    <h2>Number of tours per museum</h2>
    <p>"ACM: ".$acm</p>
    <p>"IHC: ". $ihc</p>
    <p>"MHC: " .$mhc</p>
    <p>"NMS: " .$nms</p>
    <p>"Gilman Barracks: ".$gilmanBarracks </p>
    <p>"Peranakan Museum: ".$peranakan</p>
    <p>"STPI: ". $stpi</p>
    <p>"Total: " $numTours</p>
</div>        
    </div>        

    <div class="column">
    <h3>Go to section 2:</h3>
        
        <form action="docentRecords2.php" method="POST">
        <input type="submit" value="move" name = "Go">
        </form>
        
</div>       
      </div>  
    </body>
</html>
