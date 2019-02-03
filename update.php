 
<?php 
include('server.php') ;
include('session.php');
include('header.php') ;
include('Navbar.php');




			$id = $_GET['id'];
			$query = "select itemname, quantity,image,price from item_tb where id=$id";
			$record=mysqli_query($db, $query);
			
			    
        $n = mysqli_fetch_array($record);
        $itemname = $n['itemname'];
		$quantity = $n['quantity'];
		$price = $n['price'];
		$image = $n['image'];



$img1="img/";
$img2=$n['image'];
$image="$img1$img2";

?>



    <div class="container" style="width: 70%;
margin-top: 10px;">
        <div class="card">
            <div class="card-body">
                
                
       
	<div class="header">
		<h2>Item Add</h2>
	</div>
	
                <form method="post" action="update.php" enctype="multipart/form-data" >

		<?php include('errors.php'); ?>
		<input  type="hidden" value="<?= $id ?>"  name="id"  ><br>
		 

		 
			<label>Item Name</label>
			<input class="form-control" type="text" placeholder="Enter Item Name" value="<?= $itemname ?>"  name="Itemname"  ><br>
		 
		 
			<label>Quantity</label>
                        <input type="number" max="10" min="1"class="form-control" value="<?= $quantity ?>" name="quantity" placeholder="Enter quantity"  /><br>
                        
                                        
                           <input type="file" class="form-control-file border" value="<?= $image ?>" name="image"   ><br>
						   <img class="card-img-top" src="<?php echo $image;?>"height="300px" width="300px"/>
						   
                           <label>Price</label>
                           <input class="form-control" type="number" value="<?= $price ?>" name="price" placeholder="Enter Price"  ><br>
                                  
   
		 
		   
			<button   type="submit"  min="1" class="btn btn-primary" name="update_con">update</button>
		 
		 
	</form>
    </div>
     </div>
            
        </div>
       	<?php include('footer.php') ?>