<html>
<head>
	<title>Upload an image</title>
   </head>
   <body>
   
   <form action="img.php" method="POST" enctype="multipart/form-data">
   	File:
    <input type="file" name="image"> <input type="submit" value="Upload">
    </form>
    
    <?php
		//connect to database
		mysql_connect("localhost","book_admin","z3vWvrsbC4PHTRKJ") or die("Couldn't connect!");
	mysql_select_db("tutorials") or die("Couldn't connect to db");
?>
    
    </body>
    </html>
    