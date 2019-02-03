<?php 


$query = "select * from winter where '2017-1-01' <= date and date <= '2017-12-31' UNION ALL select * from autumn where '2017-1-01' <= date and date <= '2017-12-31' UNION ALL select * from summer where '2017-1-01' <= date and date <= '2017-12-31'UNION ALL select * from spring where '2017-1-01' <= date and date <= '2017-12-31' ORDER BY `date` ASC";
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


<script>


Morris.Line({
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


