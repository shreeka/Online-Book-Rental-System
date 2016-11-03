<?php
$bookname =$_REQUEST['bookname'];


$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("books") or die("Couldn't connect to db");	

 mysql_query("DELETE FROM allbooks where bookname='$bookname' ")
 	or die(mysql_error()); 
	header("Location: booksadmin.php");
 
  ?>	