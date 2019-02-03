<?php

$Today=date('Y-m-d');

$NewDate=Date('Y-m-d', strtotime("-10 days"));
$db = mysqli_connect('localhost', 'root', '', 'final_project');

$sql = "SELECT MAX(date) AS max FROM winter UNION ALL SELECT MAX(date)  AS max FROM autumn UNION ALL SELECT MAX(date) AS max  FROM spring UNION ALL SELECT MAX(date) AS max  FROM summer";
                   
$result =  mysqli_query($db, $sql);


 



while($row = mysqli_fetch_array($result))
{

$datas[]=$row;

 		
    
		
		
 }


foreach($datas as $data){
	

	//1 for temperature
	$x[]=$data['max'];


}
 
$lastDay= max($x);
 
 
$start_ts = strtotime($lastDay);

$end_ts = strtotime($Today);

$diff = $end_ts - $start_ts;

$dif = round($diff / 86400);
echo "$dif";
 ?>