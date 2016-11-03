<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>


<link href="popup1.css" rel="stylesheet" type="text/css">
<link href="home.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="welcome">
<?php
session_start();
$username=$_SESSION['username'];

if(isset($_SESSION['username']))
echo "WELCOME ". $_SESSION['username'] . "! <br> <a href='index.php'> Log out</a>";
else
die("You must be logged in! <br> <a href='index.php'>Log in</a> "); 
?>
</div>
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
       <li><a href="#">Subscription</a> 
       <ul>
          <li><a href="#popup1">Subscribe</a></li>
          <li><a href="#popup2">Unsubscribe</a></li>
    
            
          </li>
        </ul>

       
       
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


<div id="popup1" class="overlay">
	<div class="popup">
		
		<a class="close" href="#">×</a>
        <br>
        <br>
        <br>
        
		<div class="content">
        <h2>Enter your billing information</h2>
			<form action="#popup1" method="post" target="_parent">
            <table width="100%" height="80%" cellpadding="4px" >
			<tr>
			<td>*Full Name:</td>
			<td><input name="fname" type="text" size="40%"/> </td>  </tr>
        	<tr>
			<td>*Phone: </td>
			<td><input type="tel" name="phone" size="40%"/> </td> </tr>
            <tr>
            <td>Alternate Phone: </td>
            <td> <input type="tel" name="altphone"  size="40%"/> </td></tr>  
			<tr>
			<td>*Address 1: </td>
			<td><input type="text" name="address1"  size="40%"/> </td> </tr>   
            <tr>
			<td>Address 2: </td>
			<td><input type="text" name="address2"  size="40%"/> </td> </tr>   
            <tr>
			<td>*Email: </td>
			<td><input type="email" name="email" size="40%"/> (Enter the email you've registered in.) </td> 
             </tr>   
            
            <tr>
			<td>*City: </td>
			<td><input type="text" name="city"  size="40%"/> </td> </tr> 
            <tr>
			<td>*State: </td>
			<td><input type="text" name="state"  size="40%"/> </td> </tr>   
           </table>	
           <br>
           <br>
           <hr>
            <h2>Enter your payment information</h2>	<br>
            Initial Security Deposit Amount: Rs.2000. The amount will be returned after you unsuscribe. <br>
            You should pay Rs. 200 per year to renew your membership.<br><br>
             
            Credit/Debit Card <br>
           <table>
           <tr>
           <td>*Card no: </td>
           <td><input type="tel" name="cardno" size="40%"/> </td> </tr>
           <tr>
           <td>*Cardholder's name: </td>
           <td><input type="text" name="cardholdername" size="40%"/> </td> </tr>
           
           <tr>
           <td>*Exp Date: </td>
           <td><input type="date" name="expdate" size="40%"/> </td> </tr>
           </table>
           <br>  <br>
        	<input type="submit" name="submit3" value="Submit" id="submit" />
             <?php
if(isset($_POST['submit3']))
{
	//form data
$fname=strip_tags($_POST['fname']);
$phone=strip_tags($_POST['phone']);
$altphone=strip_tags($_POST['altphone']);
$address1=strip_tags($_POST['address1']);
$address2=strip_tags($_POST['address2']);
$email=strip_tags($_POST['email']);
$city=strip_tags($_POST['city']);
$state=strip_tags($_POST['state']);
$cardno=strip_tags($_POST['cardno']);
$cardholdername=strip_tags($_POST['cardholdername']);
$expdate= strip_tags(($_POST['expdate']));
$date=date("Y-m-d");
$username=$_SESSION['username'];

$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("bookusers") or die("Couldn't connect to db");
$emailcheck1=mysql_query("SELECT * from users WHERE email='$email'");
$count1=mysql_num_rows($emailcheck1);

if($count1!=0)
{
	

$emailcheck2=mysql_query("SELECT * from subscribedusers WHERE EXISTS(SELECT email from users where email='$email') AND email='$email'");
$count2=mysql_num_rows($emailcheck2);

if($count2!=0)
{
	die("<br> You are already subscribed.");
}

if($fname&&$phone&&$email&&$address1&&$city&&$state&&$cardno&&$cardholdername&&$expdate)
	{ 
		$cardno=md5($cardno);
		$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
		mysql_select_db("bookusers") or die("Couldn't connect to db");	
		
		$query=mysql_query("INSERT into subscribedusers VALUES('','$fname','$phone','$altphone','$address1','$address2',	'$email','$city','$state','$cardno','$cardholdername','$expdate','$date','$username')");
		
		echo "<br> You are now our subscribed user! Start shopping!!";
		
		$connect2=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("rentalqueue") or die("Couldn't connect to db");
			
		$sql = mysql_query("CREATE TABLE $username (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		bookname VARCHAR(30) NOT NULL,
		authorname VARCHAR(30) NOT NULL,
		price VARCHAR(50),
		rent_date date
		)");
		
		
	}
	else

	echo "<br> Please fill out all the fields.";
	
}
else

die("<br>Use the email you've registered in.");
}



?><!--php code for subscription-->
            
        
            </form>
		</div>
	</div>
    
    
   

</div><!--end of subscription form-->


<div id="popup2" class="overlay"> 
	<div class="popupnew">
		
		<a class="close" href="#">×</a>
        <br>
        <br>
        <br>
        
		<div class="content">
<form action="#popup2" method="post" target="_parent">
  <div align="center">Confirm unsubscription?
  <table>
    <tr><td><input type="submit" name="yes" id="submit" value="Ok"></td>
      
    </table>
    <?php

if(isset($_POST['yes']))
{
	mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("bookusers") or die("Couldn't connect to db");	

 mysql_query("DELETE FROM subscribedusers where username='$username' ")
 	or die(mysql_error());
	echo "<br>You have been unsubscribed."; 
}

//if(isset($_POST['no']))
//{
	//header("location: home.php");
//}

?>

  </div>
  
</form>
</div>
</div>
</div>
<!--unsubsribe-->



 <nav id="topNAV" > 
    <div align="center">
      <p><strong>BEST SELLING BOOKS</strong>    </p>
    </div>
  </nav>

<div id="main">
<div id="innermain">
<div id="contentone">  <table width="215" height="375" border="4" align="center" id="table1">
      <tr>
      <td width="90" height="70" bgcolor="#ccc"><div align="center"><strong> GENRE</strong></div></td>
    </tr>
    <tr>
      <td height="40" ><div align="center" ><a href="sci fi.php"> SCI- FI AND FANTASY</a></div></td>
    </tr>
    <tr>
      <td height="40" ><div align="center"><a href="romance.php">ROMANCE</a></a></div></td>
    </tr>
    <tr>
      <td height="40" ><div align="center"><a href="mystery.php">MYSTERY</a></div></td>
    </tr>
    <tr>
      <td height="40" ><div align="center"><a href="nonfiction.php">NON- FICTION</a></div></td>
    </tr>
    <tr>
      <td height="40" ><div align="center"> <a href="studymaterial.php">SUBJECT MATERIAL</a></div></td>
    </tr>
</table></div>
<!--end of contentone-->

<div id="contenttwo">
  <div id="half1">
  <div id="part1">
<p> <a href="harryPotter.php"><img src="harry.png" width="215" height="235"></a> </p>
By J.K. Rowling<br>
  </div>
  
  <div id="part2">
  <p> <a href="toKillaMockingBird.php"><img src="kill.png" width="215" height="235"></a> </p>
By Harper Lee<br>
  </div>
</div><!--end of half1-->
<div id="half2">
<div id="part3">
<p> <a href="gameOfThrones.php"><img src="got.png" width="215" height="235"></a> </p>
By George R.R. Martin<br>
</div>
<div id="part4">
<p> <a href="kiteRunner.php"><img src="kite.png" width="215" height="235"></a> </p>
By Khaled Hosseini<br>
</div>
</div><!--end of half2-->
</div><!--end of contenttwo-->

</div><!--end of innermain-->
</div><!--end of main-->


<footer>
<br> 
<div id="foot">
  <div align="center" style="color: #121111"> Advertisement </div>
</div>
<p align="center"><img src="saya.jpg" width="574" height="264" align="middle"></p>
</footer>
</div><!--end of container-->
</body>
</html>