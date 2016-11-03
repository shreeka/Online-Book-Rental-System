<?php
session_start();
if(isset($_SESSION['username']))

$username=$_SESSION['username'];

$bookname =$_REQUEST['bookname'];
$authorname =$_REQUEST['authorname'];

mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("books") or die("Couldn't connect to db");
$query=mysql_query("Select * from allbooks where bookname='$bookname' and authorname='$authorname'");
while ($fetch= mysql_fetch_assoc($query))
{
	$quantity=$fetch['quantity'];
}

$quantity++;
mysql_query("UPDATE allbooks set quantity='$quantity' where bookname='$bookname' and 			              authorname='$authorname'");

$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("cart") or die("Couldn't connect to db");	

 mysql_query("DELETE FROM $username where bookname='$bookname' and authorname='$authorname' ")
 	or die(mysql_error()); 
	
	mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("checkoutdb") or die("Couldn't connect to db");	

 mysql_query("DELETE FROM $username where bookname='$bookname' and authorname='$authorname' ")
 	or die(mysql_error()); 

	header("Location: cart.php");
 
  ?>	