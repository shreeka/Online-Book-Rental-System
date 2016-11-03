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
	height: 1000px;
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
	height: 600px;
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
	background-size: cover;
}
a{
	color: #FBFBFB;
	text-decoration: none;
	background-size: cover;
}

a.visited{
color:#205081;
}

#innermain #contenttwo h2 {
	color: #874748;
}

.navmenu a:hover{
	color: #927D7D;
}
</style>
<link href="webfonts/Slabo27px_Regular/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<header><h1>Online Book Rental System</span></h1></header>
<br>
<nav id="topNAV" class="navmenu"><h2><a href="index.php">Home</a> <a href="aboutus.php">About us </a> <a href="admin.php"> Admin </a></h2></nav> <!--end of topNAV-->
<div id="main">
<div id="innermain">
<div id="contentone"> <img src="books-1.jpg" alt="" id="books"  height="300" width="480"/></div>
<!--end of contentone-->

<div id="contenttwo"> 
<h2> Log In</h2>
<br>
<form action="admin.php" method="post">
<div>
<table width="400px">
<tr>
<td>Admin email:</td>
<td><input type="text" name="email"/> </td> </tr><br>
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
	
	
		if($password=="12345")

	{
		if($email=="admin@mail.com")
		{header("location: adminhome.php"); }
		else
		echo"You are not an authorized admin.";

	}
	else
	echo"You are not an authorized admin.";

}
else
echo("Please enter email and password");
}

?>
<!--php code for login-->
<br> 
<hr>
