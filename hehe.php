<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>

<style type="text/css">
@import url("webfonts/Raleway_Bold/stylesheet.css");
@import url("webfonts/Raleway_Regular/stylesheet.css");

#container {
	width: 1024px;
	height: 728px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	float: left;
	margin-left: 100px;
}
header {
	width: 1024px;
	height: 125px;
	background-color: #E1D7D4;
	/* [disabled]color: #FFF6F6; */
	-webkit-box-shadow: 0px 0px 90px;
	box-shadow: 0px 0px 90px;
}

#main {
	width: 1024px;
	height: 540px;
}
#main #contentone {
	width: 512px;
	height: 376px;
	float: left;
	padding-top: 98px;
	padding-left: 72px;
}
#main #contenttwo {
	width: 440px;
	height: 376px;
	float: right;
	color: #874748;
	font-family: "Raleway Regular";
}
#topNAV {
	width: 1024px;
	height: 45px;

}
footer {
	width: 1024px;
	height: 100px;
}
footer #bottomNAV {
	width: 1024px;
	height: 50px;
}
h1 {
	font-family: "Slabo27px Regular";
	text-align: center;
	font-size: 4em;
	color: #874748;
}
h2 {
	margin-top: 0px;
	font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", serif;
	color: #F8F2F2;
}
#innermain {
	width: 1024px;
	height: 550px;
	border-radius: 25px;
	background-color: #E1D7D4;
}
hr {
	width: 440px;
	height: 0px;
	background-color: #0393E3;
}
#submit {
	width: 80px;
	height: 30px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	font-family: "Raleway Regular";
}
body {
	background-image: url("17845-paper-butterflies-out-of-a-book-1280x800-digital-art-wallpaper (1).jpg");
	background-repeat: repeat;
}
a{
	color: #FBFBFB;
	text-decoration: none;
}

a.visited{
color:#205081;
}

#innermain #contenttwo h2 {
	color: #874748;
}
</style>
<link href="webfonts/Slabo27px_Regular/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<header><h1>Online Book Rental System</span></h1></header>
<br>
<nav id="topNAV"><h2> <a href="aboutus.php">About us </a> <a href ="rules.php">Rules</a></h2></nav> <!--end of topNAV-->
<div id="main">
<div id="innermain">
<div id="contentone"> <img src="books-1.jpg" alt="" id="books"  height="300" width="480"/></div>
<!--end of contentone-->

<div id="contenttwo"> 
<h2> Log In</h2>
<br>
<form action="index.php" method="post">
<div>
<table width="400px">
<tr>
<td>Email:</td>
<td><input name="email" type="text" id="email"/> </td> </tr><br>
<tr>
<td>Password: </td>
<td><input type="password" name="password" id="password"/> </td> </tr> </table> <br> <br>
<input type="submit" name="submit1" value="Log In" id="submit"/>
</div>
</form>
<!--form for login-->

<?php

//form data

if(isset($_POST['submit1']))
{
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
		if($email==$dbemail && ($password)==$dbpassword)
			{
				$_SESSION['username']=$dbusername;
				header("location: home.php"); 
			}	
		else
		echo "Incorrect password.";

		}
	else
	echo "Wrong email.";

}
else
echo("Please enter email and password");
}

?>
<!--php code for login-->
<br> 
<hr>



<p><h2>New member? Sign Up now!</h2></p>
<form action="index.php" method="post">
<div>
<table width="400px">
<tr>
<td>Name: </td>
<td><input type="text" name="name" id="name"/> </td> </tr><br>
<tr>
<td>Email:</td>
 <td><input name="email" type="text" id="email"/></td> </tr>
  <br>
<tr>
<td>Password: </td>

<td><input type="password" name="password" id="password"/> </td> </tr> </table><br> 
<input type="submit" name="submit2" value="Sign Up" id="submit"/>
</div>

</form>
<!--form for signup-->

<?php

if(isset($_POST['submit2']))
{
	//form data
$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
$password= strip_tags(($_POST['password']));
$date=date("Y-m-d");

$connect=mysql_connect("localhost","book_admin","z3vWvrsbC4PHTRKJ") or die("Couldn't connect!");
mysql_select_db("bookusers") or die("Couldn't connect to db");
$emailcheck=mysql_query("SELECT email from users WHERE email='$email'");
$count=mysql_num_rows($emailcheck);

if($count!=0)
{
	die("That email is already taken. Use another email.");
}


	//check for existence
	if($name&&$email&&$password)
	{ 

		if(strlen($name)>25)
		{
			echo "The name length is too long. <br>";
		}
		if(strlen($password)>25||strlen($password)<5)
		{
		echo "Password must be between 5 to 25 characters.";
		}
		else //register the user
		{
		// encrypt password
		//$password=($password);
				
		//open database
		$connect=mysql_connect("localhost","book_admin","z3vWvrsbC4PHTRKJ") or die("Couldn't connect!");
		mysql_select_db("bookusers") or die("Couldn't connect to db");	
		
		$query=mysql_query("INSERT into users VALUES('','$name','$email','$password','$date')");
		
		echo "You have been registered!! Now you can log in!!";
		
		
		}
		
	}
	else
	echo "Please fill out all the fields.";
}

?>
<!--php code for signup-->



</div><!--end of contenttwo-->
</div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->






</body>
</html>
