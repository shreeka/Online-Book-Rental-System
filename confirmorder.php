<link href="checkout.css" rel="stylesheet" type="text/css">
<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>
<style type="text/css">
@import url("webfonts/Raleway_Regular/stylesheet.css");
@import url("webfonts/Slabo27px_Regular/stylesheet.css");
@import url("webfonts/Raleway_Bold/stylesheet.css");
</style>
</head>

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
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>Order confirmed! Your book(s) will be delivered to the address you specified within the next 24 hours. We will call you before making out deliveries.
    <?php
if(isset($_SESSION['username']))

$username=$_SESSION['username'];

$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("cart") or die("Couldn't connect to db");	

 mysql_query("DELETE FROM $username")
 	or die(mysql_error()); 
	
mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("checkoutdb") or die("Couldn't connect to db");	
$date=date("Y-m-d");
 mysql_query("UPDATE $username SET date='$date'");

mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("checkoutdb") or die("Couldn't connect to db");	
          
$sql=mysql_query("SELECT * FROM checkedout where username='$username'"); 
$numrows=mysql_num_rows($sql);

if($numrows!=0)
{
     $row=mysql_fetch_assoc($sql)    
?>
  </p>
  <div align="left">
    <table>
      <tr> 
        <td> <div align="left">Shipping Name: </div></td>
        <td> <?php echo $row['fname']?></td>
        </tr>
      <tr>
        <td> Shipping Address: </td>
        <td> <?php echo $row['address']?></td>
        </tr>
    </table>
  </div>
</div>

<?php
}
?>
   </div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->

