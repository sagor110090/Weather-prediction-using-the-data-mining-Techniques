<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
        $image="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'final_project');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
        
        

		
		        
        if (isset($_POST['update_con'])) {
            
                    
                    
		 
		$itemname = mysqli_real_escape_string($db, $_POST['Itemname']);
		$id = mysqli_real_escape_string($db, $_POST['id']);
		$quantity = mysqli_real_escape_string($db, $_POST['quantity']);
		
                $price = mysqli_real_escape_string($db,$_POST['price']);

                
                  $image = $_FILES['image']['name'];

                    $filetmpname = $_FILES['image']['tmp_name'];

                    $folder = 'img/';



                 move_uploaded_file($filetmpname, $folder.$image);
                
	
		if (empty($itemname)) { array_push($errors, "Itemname is required"); }
		if (empty($quantity)) { array_push($errors, "quantity is required"); }
 
        if(empty($price)){  array_push($errors,"enter price");}
		
		
		if($image==""){
			
			$query = "UPDATE  item_tb set itemname='$itemname', quantity='$quantity',price='$price' where id=$id";
			mysqli_query($db, $query);
			header('location: item_list.php');
			
		}
           
		else if (count($errors) == 0) {
 
		
			$query = "UPDATE  item_tb set itemname='$itemname', quantity='$quantity',image='$image',price='$price' where id=$id";
			mysqli_query($db, $query);
			header('location: item_list.php');
                        
			
				 
                     
				
			}else{
                            array_push($errors, "Wrong username/password combination");
                        }
                        

			
			 
		}

        
			
		
				 
	if (isset($_POST['predicts'])) {
			
			if (empty($_POST['date'])) {
			array_push($errors, "Date is required");}

			$new_date = date('m-d-Y', strtotime($_POST['date']));
			 
			 
			
			
            
		
			
			$date = DateTime::createFromFormat("m-d-Y" ,$new_date);
			 
			 
			$month = $date->format('m'); 

			if (count($errors) == 0) {

			if($month==12||$month==1||$month==2){
				
				header("Location:winter.php?new_date=".$new_date);

	 
}
		
		
		
		
			if($month==3||$month==4||$month==5){
			
				header("Location:spring.php?new_date=".$new_date);
	 
}
			
			if($month==6||$month==7||$month==8){
				
				header("Location:Summer.php?new_date=".$new_date);

	 
}
		
			if($month==9||$month==10||$month==11){
				
				header("Location:autumn.php?new_date=".$new_date);

	 
}
		
		
		
		
		}

}



		if (isset($_POST['save_data'])) {



		$date = mysqli_real_escape_string($db, $_POST['date']);
		$TemMax = mysqli_real_escape_string($db, $_POST['TemMax']);
		$TemAvg = mysqli_real_escape_string($db, $_POST['TemAvg']);
		$TemMin = mysqli_real_escape_string($db, $_POST['TemMin']);
		$HuMax = mysqli_real_escape_string($db, $_POST['HuMax']);
		$HuMin = mysqli_real_escape_string($db, $_POST['HuMin']);
		$WindMax = mysqli_real_escape_string($db, $_POST['WindMax']);
		$WindMin = mysqli_real_escape_string($db, $_POST['WindMin']);
		$outlook = mysqli_real_escape_string($db, $_POST['outlook']);

		

		// form validation: ensure that the form is correctly filled
		if (empty($TemMax)) { array_push($errors, "TemMax is required"); }
		if (empty($TemAvg)) { array_push($errors, "TemAvg is required"); }
		if (empty($HuMax)) { array_push($errors, "HuMax is required"); }
		if (empty($HuMin)) { array_push($errors, "HuMin is required"); }
		if (empty($WindMax)) { array_push($errors, "WindMax is required"); }
		if ($WindMin<0) { array_push($errors, "WindMin is required"); }
		if (empty($date)) { array_push($errors, "date is required"); }
		if (empty($outlook)) { array_push($errors, "outlook is required"); }


			$var = date('Y-m-d', strtotime($date));
			
			$new_date = date('m-d-Y', strtotime($date));
			 
			
			
			
            
			
			$date = DateTime::createFromFormat("m-d-Y" ,$new_date);
			 
			 
			$month = $date->format('m'); 
			

			if (count($errors) == 0) {
			

			if($month==12||$month==1||$month==2){
			$query = "SELECT * FROM winter WHERE date='$var' ";

			$results = mysqli_query($db, $query);
			 $day=0;
			while($row = mysqli_fetch_array($results)){
				 $day= $row['day'];
				 echo "$day";
			}
			if ($day==0) {
					$query = "INSERT INTO winter (day, date, TemMax, TemAvg, TemMin, HuMax, HuMin, WindMax, WindMin, outlook) VALUES (NULL, '$var', '$TemMax', '$TemAvg', '$TemMin', '$HuMax', '$HuMin', '$WindMax', '$WindMin', '$outlook')";
			mysqli_query($db, $query);
				}else{
					array_push($errors, "the data alrady in database : winter");
				}			

}		
		
		
			if($month==3||$month==4||$month==5){
			$query = "SELECT * FROM spring WHERE date='$var' ";

			$results = mysqli_query($db, $query);
			 $day=0;
			while($row = mysqli_fetch_array($results)){
				 $day= $row['day'];
				 echo "$day";
			}
			if ($day==0) {
					$query = "INSERT INTO spring (day, date, TemMax, TemAvg, TemMin, HuMax, HuMin, WindMax, WindMin, outlook) VALUES (NULL, '$var', '$TemMax', '$TemAvg', '$TemMin', '$HuMax', '$HuMin', '$WindMax', '$WindMin', '$outlook')";
			mysqli_query($db, $query);
				}else{
					array_push($errors, "the data alrady in database : spring");
				}			

	 
}
			
			if($month==6||$month==7||$month==8){
			$query = "SELECT * FROM summer WHERE date='$var' ";

			$results = mysqli_query($db, $query);
			 $day=0;
			while($row = mysqli_fetch_array($results)){
				 $day= $row['day'];
				 echo "$day";
			}
			if ($day==0) {
					$query = "INSERT INTO summer (day, date, TemMax, TemAvg, TemMin, HuMax, HuMin, WindMax, WindMin, outlook) VALUES (NULL, '$var', '$TemMax', '$TemAvg', '$TemMin', '$HuMax', '$HuMin', '$WindMax', '$WindMin', '$outlook')";
			mysqli_query($db, $query);
				}else{
					array_push($errors, "the data alrady in database : summer");
				}			

	 
}
		
			if($month==9||$month==10||$month==11){




			$query = "SELECT * FROM autumn WHERE date='$var' ";

			$results = mysqli_query($db, $query);
			 $day=0;
			while($row = mysqli_fetch_array($results)){
				 $day= $row['day'];
				 echo "$day";
			}
			if ($day==0) {
					$query = "INSERT INTO autumn (day, date, TemMax, TemAvg, TemMin, HuMax, HuMin, WindMax, WindMin, outlook) VALUES (NULL, '$var', '$TemMax', '$TemAvg', '$TemMin', '$HuMax', '$HuMin', '$WindMax', '$WindMin', '$outlook')";
			mysqli_query($db, $query);
				}else{
					array_push($errors, "the data alrady in database : autumn");
				}			

			
		}

}

			/*	echo "$var";
				$sql="SELECT * FROM autumn where date='$var'";
				$result =  mysqli_query($db, $sql);
			if (mysqli_num_rows($result) == 1) {
			
				$query = "INSERT INTO autumn (day, date, TemMax, TemAvg, TemMin, HuMax, HuMin, WindMax, WindMin, outlook) VALUES (NULL, '$var', '$TemMax', '$TemAvg', '$TemMin', '$HuMax', '$HuMin', '$WindMax', '$WindMin', '$outlook')";
			mysqli_query($db, $query);	
				}
				else {
				array_push($errors, "data alrady in database");
			


	 
}
		
		
		
		
		}
*/	

}




		
                
           

	
        

?>