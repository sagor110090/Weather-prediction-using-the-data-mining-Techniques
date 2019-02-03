
<?php 
include('server.php');
include('header.php') ; ?>
 

<body>
     <div class="container" style="width: 400px;
margin-top: 100px;">
        <div class="card">
            <div class="card-body">
 
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		
			<label>Username</label>
			<input type="text"  class="form-control" name="username" value="<?php echo $username; ?>">
		
		
			<label>Email</label>
			<input type="email" class="form-control"  name="email" value="<?php echo $email; ?>">
		
		
			<label>Password</label>
			<input type="password" class="form-control"  name="password_1">
		
		
			<label>Confirm password</label>
                        <input type="password" class="form-control"  name="password_2"><br>
		
		
			<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
		
		 
	</form>
            </div>
     </div>
            
        </div>
        
 
</body>
</html>