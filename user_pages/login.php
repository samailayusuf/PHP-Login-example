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
<style>
  	body{
  		background-color: aliceblue;
  		margin: 0;
  		padding:0;
  		box-sizing: border-box;
  		font-family: helvetica;
  	}

  	form{
  		border: 1px solid antiquewhite;
  		padding: 20px;
  		margin: 0 auto;
  		width: 500px;
  	}

  	input{
  		border: none;
  		padding: 10px;
  		background: antiquewhite;
  		border-radius: 5px;
  		font-family: helvetica;
  		font-size:18px;
  	}

  	button{
  		border: none;
  		padding: 5px 25px;
  		background: antiquewhite;
  		border-radius: 5px;
  		font-family: helvetica;
  		font-size:18px;
  	}

  	label{
  		font-size:18px;
  		font-family: helvetica;
  	}
  </style>
  <body>
  	<h3 style="text-align:center">Simple PHP Login snippet</h3>

  	<form action="" method="POST" style="text-align:center">
  		<p> <?php echo $response; ?></p>
  		
  		<Label for="username">Username
  		<input type="text" id="username" name="username" />
  		</Label><br/><br/>

  		<Label for="password"> Password
  		<input type="password" id="password" name="password" />
  		</Label><br/><br/>

  		<button type="submit" name="login">Submit</button>
  	</form>

  </body>
</html>

