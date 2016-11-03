<?php



$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
$password= strip_tags(($_POST['password']));
$date=date("Y-m-d");

if(isset($_POST['submit']))
{
	//check for existence
	if($name&&$email&&$password)
	{ 
	// encrypt password
	$password=md5($password);
	
	
	
	}
	else
	echo "Please fill out all the fields.";
}










?>