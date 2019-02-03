 
<?php 
include('server.php') ;
include('session.php');
include('header.php') ;
include('Navbar.php');
?>

</script>


    <div class="container" style="width: 700px;
margin-top: 10px;">
        <div class="card center">
            <div class="card-body">
                
                
       
	<div class="card-header text-center">
		<h2>Add Data</h2>
	</div>
	
                <form  method="post" action="data_add.php" enctype="multipart/form-data" >

		<?php include('errors.php'); ?>
 
  
		 

                           
                           <div class="card  " >
							  <div class="card-body">
							  	

							  <h6>Date</h6>
							   <input type="text" name="date" id="from" class="form-control" placeholder="Enter date"   autocomplete="off" readonly ><br>
							   <h6>Temperature Maximum :</h6>
							   <input type="number" name="TemMax"  class="form-control" placeholder="Enter Temperature Maximum"   autocomplete="off" ><br>
							   <h6>Temperature Averages :</h6>
							   <input type="number" name="TemAvg"  class="form-control"   placeholder="Enter Temperature Averages"   autocomplete="off" ><br>
							   <h6>Temperature Minimum :</h6>
							   <input type="number" name="TemMin"   class="form-control" placeholder="Enter Temperature Minimum"   autocomplete="off" ><br>
							    <h6>Humidity Maximum :</h6>
							   <input type="number" name="HuMax"  class="form-control" placeholder="Enter Humidity Maximum"  autocomplete="off" ><br>
							    <h6>Humidity Minimum :</h6>
							   <input type="number" name="HuMin"   class="form-control" placeholder="Enter Humidity Minimum"   autocomplete="off" ><br>
							    <h6>Wind Speed Maximum :</h6>
							   <input type="number" name="WindMax"   class="form-control" placeholder="Enter Wind Speed Maximum"  autocomplete="off" ><br>
							    <h6>Wind Speed Minimum :</h6>
							   <input type="number" name="WindMin"   class="form-control" placeholder="Enter Wind Speed Minimum"  autocomplete="off" ><br>
							    <h6>Outlook :</h6>

							   
							   <select class="form-control"  name="outlook"  >

							   	
							   	<option ></option>
							   	<option value="rain">rain</option>
							   	<option value="sunny">sunny</option>
							   	<option value="cold">cold</option>

							   </select><br>
							   <button   type="submit"    class="btn btn-primary" name="save_data">Save</button>

							    
							  </div>
							</div>
                                  
   
		 
		   
			
		 
		 
	</form>
    </div>
     </div>
            
        </div>
        	<link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css'>

<script  src="js/jquery.min.js"></script>
<script  src="js/jquery-ui.min.js"></script>
<script  src="js/previous_date.js"></script>

       
       	<?php include('footer.php') ?>