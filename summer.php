 
<?php

include('server.php') ;
include('session.php') ;
include('header.php');
include('Navbar.php');
$new_date = $_GET['new_date'];
$temp=0;
$i=0;


                    $sql = "SELECT * FROM summer ";
                   
                    $result =  mysqli_query($db, $sql);
                    
					
					


					
					
					
include('session.php');
				
?>
 
    <div class="container text-center"  style="width: 50%;padding: 20px;
margin-top: 10px;">
        <div class="card  center">

          <dir class="card-header text-center">
           
               <h2>Predicted Result : </h2>


          </dir>
            <div class="card-body">
			
    <div class="input-group mb-3" style="
margin-left: 78%;" >
  <p style="color: red;">Date : <?php echo "$new_date"; ?></p>
 
</div>


       
	
      
<?php
while($row = mysqli_fetch_array($result))
{

$datas[]=$row;

 
?>

		
			
    
		
		
<?php } ?>
		
		
	
<?php 


foreach($datas as $data){
	

	//1 for temperature
	$x[]=$data['day'];
  $z[]= $data['date'];


	$y1[]= $data['TemMax'];
  $y2[]= $data['TemAvg'];
  $y3[]= $data['TemMin'];
  $y4[]= $data['HuMax'];
  $y5[]= $data['HuMin'];
  $y6[]= $data['WindMax'];
  $y7[]= $data['WindMin'];


	
	
	
	
}

$f1 = linear_regression(array_values($x), array_values($y1));
$f2 = linear_regression(array_values($x), array_values($y2));
$f3 = linear_regression(array_values($x), array_values($y3));
$f4 = linear_regression(array_values($x), array_values($y4));
$f5 = linear_regression(array_values($x), array_values($y5));
$f6 = linear_regression(array_values($x), array_values($y6));
$f7 = linear_regression(array_values($x), array_values($y7));











$G_date= DateTime::createFromFormat('m-d-Y', $new_date)->format('Y-m-d');

//count date
$start_ts = strtotime($z['0']);

$end_ts = strtotime($G_date);

$diff = $end_ts - $start_ts;

$C_date= round($diff / 86400);

//echo "$C_date";




//tempMax
$m1= $f1['m'];
$b1= $f1['b'];

//tempavg
$m2= $f2['m'];
$b2= $f2['b'];

//tempMin

$m3= $f3['m'];
$b3= $f3['b'];

//huMax
$m4= $f4['m'];
$b4= $f4['b'];

//huMin
$m5= $f5['m'];
$b5= $f5['b'];

//windMax
$m6= $f6['m'];
$b6= $f6['b'];

//windmin
$m7= $f7['m'];
$b7= $f7['b'];

$temperatureMax = $b1+$m1*$C_date;
$temperatureAvg = $b2+$m2*$C_date;
$temperatureMin = $b3+$m3*$C_date;
$huMax= $b4+$m4*$C_date;
$huMin = $b5+$m5*$C_date;
$windMax = $b6+$m6*$C_date;
$windmin = $b7+$m7*$C_date;


$temperatureMax = number_format($temperatureMax, 2);
$temperatureAvg = number_format($temperatureAvg, 2);
$temperatureMin = number_format($temperatureMin, 2);
$huMax = number_format($huMax, 2);
$huMin = number_format($huMin, 2);
$windMax = number_format($windMax, 2);
$windmin = number_format($windmin, 2);
if ($windmin<0) {
  $windmin=0;
}


//var_dump( linear_regression(array_values($x), array_values($y))) ;



//linear
function linear_regression($x, $y) {

  // calculate number points
  $n = count($x);
  
  // ensure both arrays of points are the same size
  if ($n != count($y)) {

    trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
  
  }

  // calculate sums
  $x_sum = array_sum($x);
  $y_sum = array_sum($y);

  $xx_sum = 0;
  $xy_sum = 0;
  
  for($i = 0; $i < $n; $i++) {
  
    $xy_sum+=($x[$i]*$y[$i]);
    $xx_sum+=($x[$i]*$x[$i]);
    
  }
  
  // calculate slope
  $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));
  
  // calculate intercept
  $b = ($y_sum - ($m * $x_sum)) / $n;
 
  // return result
  return array("m"=>$m, "b"=>$b);
  
}



?>


<div class="card " style="background-color: rgb(223, 237, 145)">
<div class="card-body">
    <h5 class="card-title">Temperture</h5>
    <p class="card-text" style="color: rgb(255, 0, 1) "><?= "temperature Maximum : ".$temperatureMax."°F ‎/".number_format((($temperatureMax-32)*5/9), 2)."°C‎"."<br>";?></p>
    <p class="card-text" style="color: rgb(1, 0, 255) "><?= "temperature Averages : ".$temperatureAvg."°F ‎/".number_format((($temperatureAvg-32)*5/9), 2)."°C‎"."<br>";?></p>
    <p class="card-text" style="color: rgb(154, 2, 156) "><?= "temperature Minimum : ".$temperatureMin."°F ‎/".number_format((($temperatureMin-32)*5/9), 2)."°C‎"."<br>";?></p>
    
  </div>
</div>

<div class="card " style="background-color: rgb(186, 219, 201)">
  <div class="card-body">
    <h5 class="card-title">Humidity</h5>
    <p class="card-text" style="color: rgb(255, 0, 1) "><?= "Humidity Maximum : ".$huMax."<br>";?></p>
    <p class="card-text" style="color: rgb(1, 0, 255) "><?= "Humidity Minimum  : ".$huMin."<br>";?></p>
    
  </div>
</div>
<div class="card "style="background-color:rgb(195, 249, 129)">
  <div class="card-body">
    <h5 class="card-title">Wind Speed</h5>
    <p class="card-text" style="color: rgb(255, 0, 1) "><?= "Wind speed Maximum : ".$windMax."<br>";?></p>
    <p class="card-text" style="color: rgb(1, 0, 255) "><?= "Wind Spreed Minimum : ".$windmin."<br>";?></p>
    
  </div>
</div>

</div>
  </div>
    </div>
    
  <?php include('footer.php'); ?>