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
	
	font-family: "Raleway Bold";
	color: #874748;
}
#innermain {
	width: 1024px;
	height: 600px;
	border-radius: 25px;
	background-color: #E1D7D4;
	font-family:"Raleway Regular";
	font-size:16px;
	color:#874748;
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
	color: #874748;
	font-size:20px;
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

<div id="main">
<div id="innermain">

<p>
<h2 align="center">&nbsp;</h2>
<h2 align="center">Add Books</h2>
</p>
<form action="adminhome.php" method="post">
<div>
  <div align="center">
    <table width="400px">
      <tr>
        <td>Book Name: </td>
        <td><input type="text" name="bookname" size="30%" id="bookname"/> </td> </tr><br>
      <tr>
        <td>Author Name:</td>
        <td><input name="authorname" type="text" size="30%" id="authorname"/></td> </tr>
      <br>
      <tr>
        <td>Price (Rs.): </td>
        <td><input type="number" name="price" size="30%" id="price"/> </td> </tr>
        <tr>
        <td>Quantity: </td>
        <td><input type="number" name="quantity" size="30%" id="quantity"/> </td> </tr>
    </table>
    <p><br> 
      <input type="submit" name="submit2" value="Add" id="submit"/>
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>

</form>

<div align="center">
  <?php

if(isset($_POST['submit2']))
{
	//form data
$bookname=strip_tags($_POST['bookname']);
$authorname=strip_tags($_POST['authorname']);
$price=strip_tags($_POST['price']);
$quantity=strip_tags($_POST['quantity']);
$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
		mysql_select_db("books") or die("Couldn't connect to db");	
		
		$query=mysql_query("INSERT into allbooks VALUES('','$bookname','$authorname','$price','$quantity','')");
		
		echo "The book has been added.";
}
		?>
  
  
  <a href="booksadmin.php"> Show books in database </a>
  
  
  
  
</div>
</div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->






</body>
</html>
