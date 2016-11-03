<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="jquery/jquery.mobile-1.4.5.css">		
<script src="jquery/jquery-1.12.4.js"></script>
<script src="jquery/jquery.mobile-1.4.5.js"></script>

</head>
<body>
<div data-role="page">
  <div data-role="main" class="ui-content">
    <form method="post" action="cat.php">
      <div class="ui-field-contain">
        <label for="fname">First name:</label>
        <input type="text" name="fname" id="fname">
        <label for="lname">Last name:</label>
        <input type="text" name="lname" id="lname">
      </div>
      <input type="submit" name="submit1" data-inline="true" value="Submit">
    </form>
   </div>
</div>
</body>
</html>

<?php

//form data

if(isset($_POST['submit1']))
{
$connect=mysql_connect("localhost","book_admin","r2ux4dwnE4GTfRUn") or die("Couldn't connect!");
		mysql_select_db("androidlogin") or die("Couldn't connect to db");	

$cat_name=$_POST['fname'];
$cat_desc=$_POST['lname'];
$sql = "INSERT INTO categories VALUES('','$cat_name','$cat_desc')";
    $result = mysql_query($sql);

}
?>