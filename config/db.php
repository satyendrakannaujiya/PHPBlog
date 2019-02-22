<?php 
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
require('config/config.php');

//Create connectio

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(mysqli_connect_errno()){

	echo 'Failed to connect to mysql '.mysqli_connect_errno();


}










?>