
 
<?php 
include('server.php') ;
 
include('header.php') ;
 
?>
<body>
    <div class="container" style="width: 400px;
margin-top: 100px;">
        <div class="card">
            <div class="card-body">
                
                
       
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		 
			<label>Username</label>
			<input class="form-control" type="text" name="username" >
		 
		 
			<label>Password</label>
                        <input  class="form-control" type="password" name="password"><br>
		 
		   
			<button   type="submit" class="btn btn-primary" name="login_user">Login</button>
		 
	 
	</form>
    </div>
     </div>
            
        </div>
      
 
</body>
</html>