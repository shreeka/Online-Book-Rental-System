<?php

//form data
$email=$_POST['email'];
$password=$_POST['password'];

session_start();

if($email && $password)
{
	$connect=mysql_connect("localhost","book_admin","z3vWvrsbC4PHTRKJ") or die("Couldn't connect!");
	mysql_select_db("bookusers") or die("Couldn't connect to db");

	$query=mysql_query("SELECT * from users WHERE email='$email'");
	$numrows=mysql_num_rows($query);

	if($numrows!=0)
		{ 
		while($row=mysql_fetch_assoc($query))
			{
			$dbemail=$row['email'];
			$dbpassword=$row['password'];
			$dbusername=$row['username'];
			}
		if($email==$dbemail && md5($password)==$dbpassword)
			{
				echo "You're in!!<a href='member.php'> Click </a> here to enter member page. ";
				$_SESSION['username']=$dbusername;
			}	
		else
		echo "Incorrect password";

		}
	else
	echo "Wrong email.";

}
else
die("Please enter email and password");

?>