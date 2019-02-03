 
<?php include('server.php') ;

                    $sql = "SELECT itemname,quantity,image ,price FROM item_tb";
                   
                    $result =  mysqli_query($db, $sql);
                    $row = mysqli_fetch_row($result);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       
       
</head>
<body>
    <div class="container" style="
margin-top: 10px;">
        <div class="card">
            <div class="card-body">
                
                
       
	<div class="header">
		<h2>Order Page</h2>
	</div>
                
                <?php
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
$img1="img/";
$img2=$row['image'];
$image="$img1$img2";



?>
          
                <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $image;?>" alt="<?php echo $image;?>"width="200"height=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?php echo  $row['itemname'];?></a>
              </h4>
              <p class="card-text"><?php echo  $row['quantity']; ?></div>
              <p class="card-text"><?php echo  $row['price']; ?></div>
          </div>
        </div>
                </div>

 <?php

}         
?>
</div>
     </div>
            
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
</body>
</html>
 

