<?php 
	//CONTRIBUTED BY SUHAS
  $db = mysqli_connect('127.0.0.1', 'root', '', 'taken_email');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE Email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO users (username, Email, UserPassword) 
      	    	  VALUES ('$username', '$email', '".md5($password)."')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
  }
  ?>
  