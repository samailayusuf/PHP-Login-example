<?php

$con = mysqli_connect("localhost", "root", "", "test");

if($con){
	echo "Database connection success";
} else {
	echo "Connection failed try again!";
}