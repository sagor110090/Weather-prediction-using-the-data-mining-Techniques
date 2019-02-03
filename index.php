<?php 
include('server.php') ;
include('session.php');
include('header.php') ;
include('Navbar.php');

$Today=date('Y-m-d');

$NewDate=Date('Y-m-d', strtotime("-11 days"));

$query = "SELECT * FROM autumn where '$NewDate'<= date and date <='$Today' UNION ALL SELECT * FROM winter where '$NewDate'<= date and date <='$Today' UNION ALL SELECT * FROM spring where '$NewDate'<= date and date <='$Today' UNION ALL SELECT * FROM summer where '$NewDate'<= date and date <='$Today' ";
$result = mysqli_query($db, $query);
$chart_data1 = '';
$chart_data2 = '';
$chart_data3 = '';

while($row = mysqli_fetch_array($result))
{
 $chart_data1 .= "{ date:'".$row["date"]."', TemMax:".$row["TemMax"].", TemAvg:".$row["TemAvg"].", TemMin:".$row["TemMin"]." }, ";
 $chart_data2 .= "{ date:'".$row["date"]."', HuMax:".$row["HuMax"].", HuMin:".$row["HuMin"]." }, ";
  $chart_data3 .= "{ date:'".$row["date"]."', WindMax:".$row["WindMax"].", WindMin:".$row["WindMin"]." }, ";
 
}
 
$chart_data1 = substr($chart_data1, 0, -2);//tem
$chart_data2 = substr($chart_data2, 0, -2);//hu
$chart_data3 = substr($chart_data3, 0, -2);//hu
?>


  <link rel="stylesheet" href="css/morris.css">
  <script src="js/chart/jquery.min.js"></script>
  <script src="js/raphael-min.js"></script>
  <script src="js/morris.min.js"></script>
<div class="container" style="width: 100%;
margin-top:10px; ">


  <div class="card">
  
  


<div class="card-body" style="width: 100%"> 

<h5 class="card-title text-center" style="font-size: 35px">Last <b>10 Days</b> Weather Report</h5>
   <h5>Temperature:</h5>
   <div id="temperature"></div>
   <h5>Himidity:</h5>
   <div id="humidity"></div>
   <h5>Wind speed:</h5>
   <div id="wind"></div>


</div>
</div>
</div>

<script>


Morris.Bar({
  element: 'temperature',
 
 data:[<?php echo $chart_data1; ?>],
  xkey: 'date',
  ykeys: ['TemMax', 'TemAvg','TemMin'],
  labels: ['TemMax', 'TemAvg','TemMin']
});

Morris.Area({
  element: 'humidity',
 
 data:[<?php echo $chart_data2; ?>],
  xkey: 'date',
  ykeys: ['HuMax','HuMin'],
  labels: ['HuMax','HuMin']
});

Morris.Line({
  element: 'wind',
 
 data:[<?php echo $chart_data3; ?>],
  xkey: 'date',
  ykeys: ['WindMax','WindMin'],
  labels: ['WindMax','WindMin']
});



</script>

<?php include('footer.php') ?>
