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
          <li><a href="unsub.php">Unsubscribe</a></li>
    
            
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

<div id="main">
<div id="innermain">





</div><!--end of innermain-->
</div><!--end of main-->


<footer>
<br> 
</footer>
</div><!--end of container-->
</body>
</html>