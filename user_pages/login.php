<?php
require('../config/connection.php');
session_start();

 $response = "";
  
  if (isset($_POST['login'])){ //check if button is clicked

	 $username = mysqli_real_escape_string($con, $_POST['username']);
	 $password = mysqli_real_escape_string($con, $_POST['password']);
	 
	 if(!($username=='' || $password == '')){
	 	 $query = "SELECT username, password from user WHERE username = '".$username."' and password = '".$password."' "; //sql query to check user credentials
	     $result = mysqli_query($con, $query); //executing the query and storing it in result variable

	     $count = mysqli_num_rows($result);
	     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	     if($count===1){
	     	
	     	$username = $row['username'];
	     	$_SESSION['username'] = $username;
	     	header("Location:home.php"); 
	     }


	 }else{

	 	$response = "Username and password required";

	 }

	

}

?>


<html>
  <body>
  	<h3 style="text-align:center">Simple PHP Login snippet</h3>

  	<form action="" method="POST" style="text-align:center">
  		<p> <?php echo $response; ?></p>
  		
  		<Label for="username">Username
  		<input type="text" id="username" name="username" />
  		</Label><br/>

  		<Label for="password"> Password
  		<input type="password" id="password" name="password" />
  		</Label><br/>

  		<button type="submit" name="login">Submit</button>
  	</form>

  </body>
</html>

