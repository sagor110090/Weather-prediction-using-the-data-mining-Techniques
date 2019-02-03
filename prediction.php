


<?php 

include('server.php');
	 
	
	include('session.php');



?>

<?php include('header.php') ?>
<?php include('Navbar.php') ?>

	<div class="container" style="width: 100%;
margin-top:10px; ">


	<div class="card">
	
	


<div class="card-body">
    <h5 class="card-title text-center" style="font-size: 35px">Weather Prediction System </h5>
  <div style="width: 50%;margin-left: 20%; margin-top:210px;height:280px"> 

     <form method="post" action="index.php" enctype="multipart/form-data" >

<div class="form-group row ">
 
<div class="input-group mb-3" style="">
<label for="example-date-input" class="col-2 col-form-label"><h4>Date</h4></label>
  <input type="text" name="date" id="from" class="form-control" autocomplete="off" >
  <div class="input-group-append" >
    <button class="btn btn-primary" type="submit" name="predicts">Submit</button>
    
  </div>




  </div>
</div>

<div style="width: 75%;margin-left: 15%; margin-top:10px;">
	
<?php include('errors.php'); ?> 	
</div>






	</div>
	</form>
	
</div>
</div>
</div>

	 
    <script  src="js/jquery.min.js"></script>
    <script  src="js/jquery-ui.min.js"></script>
    <script  src="js/index.js"></script>
	<?php include('footer.php') ?>