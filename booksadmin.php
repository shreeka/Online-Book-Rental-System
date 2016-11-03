<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>

<style type="text/css">
@import url("webfonts/Raleway_Bold/stylesheet.css");
@import url("webfonts/Raleway_Regular/stylesheet.css");

#container {
	width: 1024px;
	height: 1200px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	float: left;
	margin-left: 100px;
}
header {
	width: 1024px;
	height: 125px;
	background-color: #E1D7D4;
	/* [disabled]color: #FFF6F6; */
	-webkit-box-shadow: 0px 0px 90px;
	box-shadow: 0px 0px 90px;
}

#main {
	width: 1024px;
	height: 540px;
}
#main #contentone {
	width: 512px;
	height: 376px;
	float: left;
	padding-top: 98px;
	padding-left: 72px;
}
#main #contenttwo {
	width: 440px;
	height: 376px;
	float: right;
	color: #874748;
	font-family: "Raleway Regular";
}
#topNAV {
	width: 1024px;
	height: 45px;

}
footer {
	width: 1024px;
	height: 100px;
}
footer #bottomNAV {
	width: 1024px;
	height: 50px;
}
h1 {
	font-family: "Slabo27px Regular";
	text-align: center;
	font-size: 4em;
	color: #874748;
}
h2 {
	margin-top: 0px;
	font-family:"Raleway Regular";
	color:#874748;
}
#innermain {
	width: 1024px;
	height: 980px;
	border-radius: 25px;
	background-color: #E1D7D4;
	overflow: auto;
	padding-bottom:30px;
	
}
hr {
	width: 440px;
	height: 0px;
	background-color: #0393E3;
}
#submit {
	width: 80px;
	height: 30px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	font-family: "Raleway Regular";
}
body {
	background-image: url("17845-paper-butterflies-out-of-a-book-1280x800-digital-art-wallpaper (1).jpg");
	background-size: cover;
}
a{
	color: #874748;
	text-decoration: none;
	background-size: cover;
}

a.visited{
color:#205081;
}

#innermain #contenttwo h2 {
	color: #874748;
}

.navmenu a:hover{
	color: #927D7D;
}
#main table { 
            width: 600px; 
			font-family: "Raleway Regular";
	color: #874748;
	font-size: large;
        } 
          
            #main table th {
	padding: 10px;
	text-align: left;
	background-color: #664430;
	font-family:"Raleway Bold";
	color:#F1F0F0	
            } 
              
            #main table td { 
                padding: 5px; 
            } 
              
            #main table tr { 
                background-color: #d3dcf2; 
            } 
			
</style>
<link href="webfonts/Slabo27px_Regular/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<header><h1>Online Book Rental System</span></h1></header>
<br>

<div id="main">
<div id="innermain">
<p><h2 align="center">Books in database</h2></p>


<div align="center">
  <table> 
    <tr> 
      <th>Book Name</th> 
      <th>Author Name</th> 
      <th>Price(Rs.)</th>
      <th> Quantity</th>
      <th></th> 
      </tr> 
    
    <?php 
			$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
			mysql_select_db("books") or die("Couldn't connect to db");	
          
            $sql=mysql_query("SELECT * FROM  allbooks order by bookname ASC"); 
		
			
          
         
           while($row=mysql_fetch_assoc($sql)) { 
                  
        ?> 
    <tr> 
      <td><?php $bookname=$row['bookname']; echo $bookname; ?></td> 
      <td><?php $authorname=$row['authorname']; echo $authorname; ?></td> 
      <td><?php echo $row['price'] ?></td> 
      <td><?php echo $row['quantity'] ?></td> 
      <td> <a href="deleteadmin.php?bookname=<?php echo "$bookname" ?>">Delete </a> 
        
        
     </td> </tr> 
    
    <?php 
                  
            } 
			 
        ?> 
    
    </table>
</div>
