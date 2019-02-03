 
<?php
include('server.php') ;
$temp=0;
$i=0;


                    $sql = "SELECT * FROM winter ";
                   
                    $result =  mysqli_query($db, $sql);
                    
					
					


					
					
					
include('session.php');
include('header.php') ;
include('Navbar.php');					
?>
 
    <div class="container" style="width: 100%;
margin-top: 10px;">
        <div class="card">
            <div class="card-body">
			
			<div class="input-group mb-3" style="width: 30%;
margin-left: 70%;" >
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div>
</div>

       
	<div class="header">
		<h2>Item List</h2>
	</div>

                <table class="table table-striped table-hover">
             
                        <tr>
                            <td>count</td>
                            <td>data</td>
                            
                            <td>TemMax</td>
                            <td>TemAvg</td>
                           <td>TemMin</td>
						   
                           <td>HuMax</td>
                           <td>HuMin</td>
                           <td>WindMax</td>
                           <td>winMin</td>
                           <td>outlook</td>
                          
                        </tr>         
<?php
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['count'] . "</td>";
echo "<td>" . $row['data'] . "</td>";

echo "<td>" . $row['TemMax'] . "</td>";
echo "<td>" . $row['TemAvg'] . "</td>";
echo "<td>" . $row['TemMin'] . "</td>";

echo "<td>" . $row['HuMax'] . "</td>";
echo "<td>" . $row['HuMin'] . "</td>";

echo "<td>" . $row['WindMax'] . "</td>";
echo "<td>" . $row['winMin'] . "</td>";
echo "<td>" . $row['outlook'] . "</td>";

$datas[]=$row;

 
?>

		
			
        </tr>
		
		
<?php } ?>
		</table>
		
		</div>
		</div>
		</div>
<?php 


foreach($datas as $data){
	
	//echo $data['count']."    ";
	//echo $data['TemMax']."    ";
	
	
	
	$x[]=$data['count'];
	$y[]= $data['TemMax'];
	$z[]= $data['data'];
	
	
	
	
	
}
print_r(array_values($x)); 
$f = linear_regression(array_values($x), array_values($y));
print_r($f);
$m= $f['m'];
$b= $f['b'];
$fy = $b+$m*91;
echo $fy;
echo $z['0'];
echo $z['80'];
 

//var_dump( linear_regression(array_values($x), array_values($y))) ;

include('footer.php');
 

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
  echo "Sum of the two numbers is : $m ";
    
  // return result
  return array("m"=>$m, "b"=>$b);
  
}



?>