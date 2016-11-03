<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Book Rental System</title>
<style type="text/css">
@import url("webfonts/Raleway_Regular/stylesheet.css");
@import url("webfonts/Slabo27px_Regular/stylesheet.css");
@import url("webfonts/Raleway_Bold/stylesheet.css");

#container {
	width: 1024px;
	height: 728px;
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
	height: 580px;
}
#main #contentone {
	width: 300px;
	height: 580px;
	float: left;
	padding-top: 50px;
	padding-left: 30px;
	text-align: center;
}
#main #contenttwo {
	width: 600px;
	height: 376px;
	float: right;
	color: #874748;
	;
	font-size: medium;
	text-align: justify;
	font-family: "Raleway Regular";
	padding-right: 25px;
	word-spacing: 2px;
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
	;
	text-align: center;
	font-size: 4em;
	color: #874748;
	font-family: "Slabo27px Regular";
}

#innermain {
	width: 1024px;
	height: 550px;
	border-radius: 25px;
	background-color: #E1D7D4;
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
	background-repeat: repeat;
}

#titlebar {
	height: 90px;
	width: 1024px;
	background-color: ;
	font-family: "Raleway Regular";
}
h2 {
	
	;
	font-family: "Raleway Bold";
}
#container #topNAV {
	width: 1024px;
	height: 30px;
}
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
      <li><a href="#">rent books</a>
        <ul>
          <li><a href="#">rental queue</a></li>
          <li><a href="#">rent date</a></li>
          <li><a href="#">return rented books</a>
            
          </li>
        </ul>
      </li>
      <li><a href="#">shopping cart</a>
        <ul>
          <li><a href="#">list of book</a></li>
          <li><a href="#">total ammount</a></li>
        </ul>
      </li>
      <li><a href="#">search</a></li>
    </ul>
  </div>
</nav>

<link rel="stylesheet" type="text/css" href="practice.css" media="screen" />
</div><!-- end titlebar-->

<nav id="topNAV" > </nav>

<div id="main">
<div id="innermain">
<div id="contentone"><img src="operatingSystem.jpg" width="283" height="329" alt=""/>
<br> <br><input type="submit" id="submit" value="Add to cart"/> <br>
<input type="submit" id="submit" value="Rent"/>


</div>
<!--end of contentone-->

<div id="contenttwo"> 
<h2 align="center">Operating System<br> 
By : Andrew S. Tanenbaum</h2>

<p> For software development professionals and computer science students,Modern Operating Systems gives a solid conceptual overview of operating system design, including detailed case studies of Unix/Linux and Windows 2000.
What makes an operating system modern? According to author Andrew Tanenbaum, it is the awareness of high-demand computer applications--primarily in the areas of multimedia, parallel and distributed computing, and security. The development of faster and more advanced hardware has driven progress in software, including enhancements to the operating system. It is one thing to run an old operating system on current hardware, and another to effectively leverage current hardware to best serve modern software applications. If you don't believe it, install Windows 3.0 on a modern PC and try surfing the Internet or burning a CD.
 </p>
  
 



</div><!--end of contenttwo-->
</div><!--end of inner main-->
</div> <!--end of main-->

<footer>
  <nav id="bottomNAV"></nav><!--end of bottomNAV-->
</footer>
</div> <!--end of container-->



