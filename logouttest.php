<?php include_once("dbtest.php"); ?>

<?php

session_start(); #starts the session
session_unset(); #remove all the variables in the session
session_destroy(); #destroys the session

if (!$_SESSION['userName']){
	echo "Successfully logged out!<br />";
    echo "<br /><a href='loginform.php'>Login</a>";
}
	
else{
	echo "Error Occured!<br />";
	echo "<br /><a href='loginform.php'>Login</a>";
}
	
?>
