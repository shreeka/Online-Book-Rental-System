<?php
session_start();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>

<link href="books.css" rel="stylesheet" type="text/css">
</head>
<?php
$bookname="Computer Graphics";
$authorname="Hearn, Baker, Carithers";
$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
	mysql_select_db("books") or die("Couldn't connect to db");

	$bookfetchquery=mysql_query("SELECT * from allbooks WHERE bookname='$bookname' and authorname='$authorname'");
	$numrows=mysql_num_rows($bookfetchquery);
	if($numrows!=0)
		{ 
		while($row=mysql_fetch_assoc($bookfetchquery))
			{
			$bookname=$row['bookname'];
			$authorname=$row['authorname'];
			$price=$row['price'];
			
			}
		}

?>

<body>
<div id="container">
<header><h1>Online Book Rental System</span></h1></header>

<div id="titlebar">
<nav>
  <div align="center">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="#">RentalQ</a>
        <ul>
          <li><a href="rent.php">View RentalQ</a></li>
          <li><a href="#">rules</a></li>
    
            
          </li>
        </ul>
      </li>
      <li><a href="#">shopping cart</a>
        <ul>
          <li><a href="cart.php">View my cart</a></li>
        
        </ul>
      </li>
      <li><a href="#">search</a></li>
    </ul>
  </div>
</nav>
<link rel="stylesheet" type="text/css" href="dropdown.css" media="screen" />
</div><!-- end titlebar-->
<nav id="topNAV" > </nav>

<div id="main">
<div id="innermain">
<div id="contentone"><img src="computerGraphics.jpg" width="283" height="329" alt=""/>
<br> 
<br><form action="computerGraphics.php" method="post">
<input type="submit" id="submit" name="submit1" value="Add to cart"/> <br>
<input type="submit" id="submit" name="submit2" value="Rent"/>
</form>
<?php

if(isset($_SESSION['username']))

$username=$_SESSION['username'];
{
	
	if(isset($_POST['submit2']))
	
	{

	$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
	mysql_select_db("bookusers") or die("Couldn't connect to db");

	$query=mysql_query("SELECT * from subscribedusers WHERE username='$username'");
	$numrows=mysql_num_rows($query);

	if($numrows!=0)
		
		{	$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("rentalqueue") or die("Couldn't connect to db");	
			$bookcheck=mysql_query("SELECT * from $username WHERE bookname='$bookname' and authorname='$authorname'");
			$bookcount=mysql_num_rows($bookcheck);
			if($bookcount!=0)
			
				echo "<br><br>Book already in rentalQ.";
			
			else
			{ 
			echo "<br><br>Added to rentalQ"; 
			
			$date=date("Y-m-d");
			$query2=mysql_query("INSERT into $username VALUES('','$bookname','$authorname','$price','$date')");
			}
			
		}
	else
	echo "<br><br>You are not a subcribed user. Please Subscribe first.";
	}
	if(isset($_POST['submit1']))
	
	{
echo "Added To Cart";
	$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
	mysql_select_db("bookusers") or die("Couldn't connect to db");

	$query=mysql_query("SELECT * from  users WHERE username='$username'");
	$numrows=mysql_num_rows($query);

	if($numrows!=0)
		
		{	$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("cart") or die("Couldn't connect to db");	
			
			$query2=mysql_query("INSERT into $username VALUES('','$bookname','$authorname','$price')");
			}
			
		}
	
	
	
}

?>


</div>
<!--end of contentone-->
<div id="contenttwo"> 
<h2 align="center">Computer Graphics<br> 
By : Hearn, Baker, Carithers</h2>

<p> "Computer Graphics with OpenGL, 4/e" is appropriate for junior-to graduate-level courses in computer graphics.

Assuming no background in computer graphics, this junior-to graduate-level course presents basic principles for the design, use, and understanding of computer graphics systems and applications. The authors, authorities in their field, offer an integrated approach to two-dimensional and three-dimensional graphics topics. A comprehensive explanation of the popular OpenGL programming package, along with C++ programming examples illustrates applications of the various functions in the OpenGL basic library and the related GLU and GLUT packages.
 </p>
  
 



</div><!--end of contenttwo-->
</div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->



