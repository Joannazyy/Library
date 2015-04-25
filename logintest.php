<?php
include 'head.php';
?>

<h1>Membership Information</h1>


<?php include_once("dbtest.php");

?>

<?php

     $uname = $_POST['name'];
     $pass = $_POST['pwd'];
     $id = $_POST['id'];

     $sql = "SELECT * FROM membership WHERE (
     	password='".$pass."' and id='".$id."')";

     #SELECT count(*) FROM membershiptest where (
     #username='$uname' and password='$pass');
     
     $query = mysql_query($sql);

     $result = mysql_fetch_array($query);

     if ($result[0]>0){
     	$_SESSION['userName'] = $uname;
     	echo "<br /><h2>Welcome ".$_SESSION['userName']."!</h2>";
          echo "<br /><h3>Check out your books!</h3>";

          $check="SELECT * From issue WHERE ( ID='".$id."')";

          $check_query = mysql_query($check);

          $check_result = mysql_fetch_array($check_query);

          echo "<table class='table table-striped table-bordered' style='margin-top: 10px'><tr>
               <th>ID</th>
               <th>Book Title</th>
               <th>Issue Date</th>
               <th>Due Date</th>
               </tr>";
          if ($row = $check_result) {
               echo "<tr>";
               echo "<td>" . $row['ID'] . "</td><td>"
                   ."<a href='items.php?number=".$row['ID']."'>". $row['Book_title'] . "</a></td><td>"
                   . $row['Issue_date'] . "</td><td>"
                   . $row['Due_date'] . "</td>";
               echo "</tr>";
          }
          echo "</table>";


     	echo "<br /><a href='logouttest.php'>LogOut</a>";

     }
     else{
     	echo "Login Failed";
     	echo "<br /><a href='signupform.php'>SignUp</a>";
     	echo "<br /><a href='loginform.php'>Login</a>";

     }


?>
