<?php
include 'head.php';
?>

<h1>Congratulations! You become a member now!</h1>

<?php include_once("dbtest.php") ?>

<?php
    $user = $_POST['n'];
    $pass = $_POST['p'];
    $id   = $_POST['id'];
    $sql = "INSERT into membership values(".$id.",'".$user."','".$pass."')";


    $query = mysql_query($sql);

    #INSERT into testnew values(
    #	1,
    #	'satish',
    #	'satish');

    if(!$query){
    	echo "Fail".mysql_error();
    	echo "<br /><a href='signupform.php'>SignUp</a>";
    	echo "<br /><a href='loginform.php'>Login</a>";
    }
    	
    else{
    	echo "<br /><a href='signupform.php'>SignUp</a>";
    	echo "<br /><a href='loginform.php'>Login</a>";
    }
    	

?>
