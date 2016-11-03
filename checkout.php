<?php
session_start();
if(isset($_SESSION['username']))

$username=$_SESSION['username'];

		



	

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
<link href="checkout.css" rel="stylesheet" type="text/css">
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

<h2 align="center">   Check Out </h2>

<h3 align="center"> Your Shipping Address </h3>
<form method="post" action="checkout.php">
<tr>
			<td><blockquote>
			  <blockquote>
			    <p>*Full Name:</p>
		      </blockquote>
		    </blockquote></td>
            <td><blockquote>
              <blockquote>
                <p>
                  <input type="text" size="40%" style="font-size:12pt; height:20pt; font-family:'Raleway Regular';" id="name" name ="fname"> 
                </p>
              </blockquote>
            </blockquote></td>  
            </tr>
            <td><blockquote>
              <blockquote>
                <p>*Address</p>
              </blockquote>
            </blockquote></td>
            <td><blockquote>
              <blockquote>
                <p>
                  <input type="text" size="40%" style="font-size:12pt; height:20pt; font-family:'Raleway Regular';" id="address" name ="address"> 
                </p>
              </blockquote>
            </blockquote></td>  
            </tr>
            <td><blockquote>
              <blockquote>
                <p>*City</p>
              </blockquote>
            </blockquote></td>
            <td><blockquote>
              <blockquote>
                <p>
                  <input type="text" size="40%" style="font-size:12pt; height:20pt; font-family:'Raleway Regular';" id="city" name ="city"> 
                </p>
              </blockquote>
            </blockquote></td>  
            </tr>
            <td><blockquote>
              <blockquote>
                <p>Contact No.</p>
              </blockquote>
            </blockquote></td>
            <td><blockquote>
              <blockquote>
                <p>
                  <input type="tel" size="40%" style="font-size:12pt; height:20pt; font-family:'Raleway Regular';" id="contact" name ="contact"> 
                </p>
              </blockquote>
            </blockquote></td>  
            </tr>
         
 <tr> 
   <blockquote>
     <blockquote>
       <p>
         <input type="submit" style="width:120px" name="submit" id="submit" value="Save & Continue"/>
       </p>
     </blockquote>
   </blockquote>
 </tr>
</form>
<?php
if(isset($_POST['submit']))
{
	$fname=strip_tags($_POST['fname']);
	$address=strip_tags($_POST['address']);
	$city=strip_tags($_POST['city']);
	$contact=strip_tags($_POST['contact']);
		if($fname&&$address&&$city&&$contact)
			{
				mysql_query("INSERT into checkedout                        			VALUES('','$username','$fname','$address','$city','$contact','$date')");
				header("location: orders.php");
			}
		else
		echo "Please fill out all the fields";


}

 ?>
   </div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->