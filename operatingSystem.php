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
$bookname="Operating System";
$authorname="Andrew S. Tanenbaum";
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
			$quantity=$row['quantity'];
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
          <li><a href="rules.php">rules</a></li>
    
            
          </li>
        </ul>
      </li>
      <li><a href="#">shopping cart</a>
        <ul>
          <li><a href="cart.php">View my cart</a></li>
        
        </ul>
      </li>
      <li><a href="search.php">search</a></li>
    </ul>
  </div>
</nav>
<link rel="stylesheet" type="text/css" href="dropdown.css" media="screen" />
</div><!-- end titlebar-->
<nav id="topNAV" > </nav>

<div id="main">
<div id="innermain">
<div id="contentone"><img src="operatingSystem.jpg" width="283" height="329" alt=""/>
<br> 
<br><form action="operatingSystem.php" method="post">
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
			
			$totalbooks=mysql_query("SELECT * from $username");
			if(mysql_num_rows($totalbooks)=='2')
			{echo"You have rented the maximum number of books allowed.";}	
			else
			{$bookcheck=mysql_query("SELECT * from $username WHERE bookname='$bookname' and authorname='$authorname'");
			$bookcount=mysql_num_rows($bookcheck);
	
			
			if($bookcount!=0)
			
				echo "<br><br>Book already in rentalQ.";
			
			else
			{ 
				if($quantity!=0)
				{
				
					$quantity--;
					mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
					mysql_select_db("books") or die("Couldn't connect to db");
					mysql_query("UPDATE allbooks set quantity='$quantity' where bookname='$bookname' and 			                    authorname='$authorname'");
					
						echo "<br><br>Added to rentalQ"; 
			
					$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
					mysql_select_db("rentalqueue") or die("Couldn't connect to db");
					$date=date("Y-m-d");
					$query2=mysql_query("INSERT into $username VALUES('','$bookname','$authorname','$price','$date')");
				}
				else
				echo("<br>Sorry, This book is out of stock right now. Try again later.");
			}
			
			}
		}
	else
	echo "<br><br>You are not a subcribed user. Please Subscribe first.";
	}
	
	if(isset($_POST['submit1']))
	
	{
	
			if($quantity!=0)
			{
				
				$quantity--;
				mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
				mysql_select_db("books") or die("Couldn't connect to db");
				mysql_query("UPDATE allbooks set quantity='$quantity' where bookname='$bookname' and 			                authorname='$authorname'");
		
				echo "<br>Added To Cart";
				$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
				mysql_select_db("bookusers") or die("Couldn't connect to db");
			
				$query=mysql_query("SELECT * from  users WHERE username='$username'");
				$numrows=mysql_num_rows($query);
			
				if($numrows!=0)
					
					{	$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!")				                        ;
						mysql_select_db("cart") or die("Couldn't connect to db");	
						
						
						$query2=mysql_query("INSERT into $username VALUES('','$bookname','$authorname','$price')");
						
						$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!")                         ;
						mysql_select_db("checkoutdb") or die("Couldn't connect to db");	
						
						mysql_query("INSERT into $username VALUES('','$bookname','$authorname','$price','')");
						}
			}
			else
			echo("<br>Sorry, This book is out of stock right now. Try again later.");
			
		}
	
	
	
}

?>

</div>
<!--end of contentone-->

<div id="contenttwo"> 
<h2 align="center">Operating System<br> 
By : Andrew S. Tanenbaum</h2>

<p> For software development professionals and computer science students,Modern Operating Systems gives a solid conceptual overview of operating system design, including detailed case studies of Unix/Linux and Windows 2000.
What makes an operating system modern? According to author Andrew Tanenbaum, it is the awareness of high-demand computer applications--primarily in the areas of multimedia, parallel and distributed computing, and security. The development of faster and more advanced hardware has driven progress in software, including enhancements to the operating system. It is one thing to run an old operating system on current hardware, and another to effectively leverage current hardware to best serve modern software applications. If you don't believe it, install Windows 3.0 on a modern PC and try surfing the Internet or burning a CD.
 </p>
  
 <br> <br> Price:Rs.<?php echo $price ?>



</div><!--end of contenttwo-->
</div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->



