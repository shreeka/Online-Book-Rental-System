<?php

session_start();
session_destroy();

echo "You've been logged out! <a href='index.html'> Click </a> here to return to home page.";

?>