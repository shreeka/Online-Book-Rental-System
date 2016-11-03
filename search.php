<link href="rent.css" rel="stylesheet" type="text/css">

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

  
    <div align="center">



<br><br><br><br><br>
<form  method ="POST" >
  
 <input type="text" size="40%" style="font-size:12pt; height:25pt; font-family:'Raleway Regular';" id="search" name ="search_name" placeholder="Book/Author">
 <input type = "submit" id="submit" name="submit" value = "Search">
</form>
  <?php

$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
	mysql_select_db("books") or die("Couldn't connect to db");

if (isset($_POST['search_name'] )) {

$search_name = $_POST['search_name'];


if (!empty($search_name)) {

$query = "SELECT * FROM allbooks WHERE bookname LIKE '%".$search_name."%'
OR authorname LIKE '%".$search_name."%'";

$query_run = mysql_query($query);

if($query_run)
{
$query_num_rows= mysql_num_rows($query_run);

if ($query_num_rows >=1) {

echo $query_num_rows. ' results found : <br>';

while ($query= mysql_fetch_assoc($query_run)) {



?>
  <a href="<?php echo $query['url'];?> "> <?php echo $query['bookname'] ;?> by <?php echo $query['authorname'] ;?> <br><br> </a>
  
  <?php


}


}
} else {

echo 'no results found' ;

}

}

}





?>
  
</p>


</div>    
    
  </div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->

