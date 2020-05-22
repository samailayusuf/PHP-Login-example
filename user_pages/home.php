<?php
session_start();

if( ! isset($_SESSION['username'])){
	echo "You're not Logged in <a href='./user_pages/login.php'>LOGIN</a> ";
}else{

	echo "<h3> Welcome - ".$_SESSION['username']. "</h3>";
    echo "<p> <a href='./logout.php'> LOGOUT </a> </p>";
}