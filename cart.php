<link href="rent.css" rel="stylesheet" type="text/css">
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
<h3 align="center">&nbsp; </h3>
<h3 align="center">Shopping Cart </h3> 

  
    <div align="center">
      <p>
        <?php
if(isset($_SESSION['username']))

$username=$_SESSION['username'];
$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
mysql_select_db("cart") or die("Couldn't connect to db");	
          
$sql=mysql_query("SELECT * FROM  $username"); 
$numrows=mysql_num_rows($sql);

if($numrows!=0)
{
         
?>
      </p>
      
      <table> 
        <tr> 
          <th>Book Name</th> 
          <th>Author Name</th> 
     
          <th>Price</th>
          <th> </th>
        
   
          </tr> 
        
        <?php 
			$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("cart") or die("Couldn't connect to db");	
			
			
			$query=mysql_query("SELECT bookname, authorname,price
								FROM $username
								
								 ");
	
          
           
         $totalprice=0;
           while($row=mysql_fetch_assoc($query)) { 
		   
			//$qty=$row['count(*)'];
			 
		  
			  $subtotal=$row['price'];
              $totalprice+=$subtotal; 
                  
        ?> 
        <tr> 
          <td><?php $bookname=$row['bookname']; echo $bookname; ?></td> 
          <td><?php $authorname=$row['authorname']; echo $authorname; ?></td> 
          
           
         <td>Rs.<?php echo $row['price'] ?></td> 
     <?php   $url = "deletecart.php?bookname=".$bookname."&authorname=".$authorname; ?>
          <td> <a href="<?php echo $url ?>">Remove </a> 
		  	 

   </td>
     
         
         </tr> 
           
        <?php 
                  
            } 
			 
        ?> 
        
        
  <tr> 
    <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
    <td></td>
     </tr> 
    
     
</table> 
<a href="checkout.php"> Check out and Get your books delivered! :) :)  <br> 
</a> 
    
    <?php 
} else
echo "<br><br><br>No books ADDED in the cart yet."	;		
          
        ?>
  
           
    </div>    
    
  </div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->



