<?php
session_start();

if(isset($_SESSION['username']))
echo "WELCOME ". $_SESSION['username'] . "! <br> <a href='logout.php'> Log out</a>";
else
die("You must be logged in!"); 










?>