<?php
require('config/connection.php');

 $response = "";
  
  if (isset($_POST['ok'])){ //check if button is clicked

	 $fname = $_POST['fname']; //capture data from form using POST array
	 $lname = $_POST['lname'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 
	 if(!($fname == '' || $lname=='' || $password == '')){
	 	 $query = "insert into user(firstname, lastname, username, password) VALUES('".$fname."', '".$lname."', '".$username."',  '".$password."')"; //sql query to add a record to a database
	     $result = mysqli_query($con, $query); //executing the query and storing it in result variable

	     if($result){ //checking if the result variable contains valid data and queery was successful
	 	 $response = "Registration successful <a href='./user_pages/login.php'>Click Here To Login</a>";
	 	//header("Location: ../index.php");
	     }else{
	 	 	$response = "error somewhere";
		 }

	 }else{

	 	$response = "All values are required";

	 }

	

}

?>


<html>
  <body>
  	<h3 style="text-align: center">Simple PHP Login snippet</h3>

  	<form action="" method="POST" style="text-align:center;">
  		<p> <?php echo $response; ?></p>
  		<Label for="fname"> First Name
  		<input type="text" id="fname" name="fname" />
  		</Label><br/><br/>

  		<Label for="lname"> Last Name
  		<input type="text" id="lname" name="lname" />
  		</Label><br/><br/>

  		<Label for="username"> Username
  		<input type="text" id="username" name="username" />
  		</Label><br/><br/>

  		<Label for="password"> Password
  		<input type="password" id="password" name="password" />
  		</Label><br/><br/>

  		<button type="submit" name="ok">Submit</button>
  	
  	<p>Already registered? <a href="./user_pages/login.php">LOGIN</a></p>
</form>
  </body>
</html>

