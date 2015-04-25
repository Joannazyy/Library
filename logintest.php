<?php
include 'head.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
h1{

  font-weight: bolder;
}

</style>
</head>
</html>

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


          // Table 1
          echo "<br /><h3>Personal Information</h3>";

          $info= "SELECT id, username, Street, City, Region, Zip_code, Date_of_issue, Date_of_expiry, Status FROM membership_full
             WHERE (id='".$id."')";
     
          $info_query=mysql_query($info);

          echo "<table class='table table-striped table-bordered' style='margin-top: 10px'><tr>
               <th>ID</th>
               <th>Name</th>
               <th>Street</th>
               <th>City</th>
               <th>Region</th>
               <th>Zip code</th>
               <th>Issue Date</th>
               <th>Expire date</th>
               <th>Status</th>
               </tr>";
          while ($row = mysql_fetch_array($info_query)) {
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td><td>"
                   ."<a href='items.php?number=".$row['id']."'>". $row['username'] . "</a></td><td>"
                   . $row['Street'] . "</td><td>"
                   . $row['City'] . "</td><td>"
                   . $row['Region'] . "</td><td>"
                   . $row['Zip_code'] . "</td><td>"
                   . $row['Date_of_issue'] . "</td><td>"
                   . $row['Date_of_expiry'] . "</td><td>"
                   . $row['Status'] . "</td>";
               echo "</tr>";
          }
          echo "</table>";

          // Table 2
          echo "<br /><h3>Check out your books!</h3>";

          $check="SELECT * From issue WHERE ( ID='".$id."')";

          $check_query = mysql_query($check);

          #$check_result = mysql_fetch_array($check_query);

          echo "<table class='table table-striped table-bordered' style='margin-top: 10px'><tr>
               <th>ID</th>
               <th>Book Title</th>
               <th>Issue Date</th>
               <th>Due Date</th>
               </tr>";
          while ($row = mysql_fetch_array($check_query)) {
               echo "<tr>";
               echo "<td>" . $row['ID'] . "</td><td>"
                   ."<a href='items.php?number=".$row['ID']."'>". $row['Book_title'] . "</a></td><td>"
                   . $row['Issue_date'] . "</td><td>"
                   . $row['Due_date'] . "</td>";
               echo "</tr>";
          }
          echo "</table>";

          // Table 3
          echo "<br /><h3>Your events schedule!</h3>";

          $find="SELECT * From membership_activity WHERE ( id='".$id."')";

          $find_query = mysql_query($find);

          #$find_result = mysql_fetch_assoc($find_query);

          echo "<table class='table table-striped table-bordered' style='margin-top: 10px'><tr>
               <th>ID</th>
               <th>Number</th>
               <th>Date</th>
               <th>Start time</th>
               <th>End time</th>
               <th>Event name</th>
               <th>Age group</th>
               <th>Event type</th>
               <th>Event description</th>
             </tr>";
          if (mysql_num_rows($find_query)>0) {
               while ($row=mysql_fetch_assoc($find_query)){
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td><td>"
                   ."<a href='items.php?number=".$row['id']."'>". $row['Number'] . "</a></td><td>"
                   . $row['Date_of_event'] . "</td><td>"
                   . $row['Start_time_of_event'] . "</td><td>"
                   . $row['End_time_of_event'] . "</td><td>"
                   . $row['Event_name'] . "</td><td>"
                   . $row['Age_group'] . "</td><td>"
                   . $row['Event_type'] . "</td><td>"
                   . $row['Event_description'] . "</td>";
               echo "</tr>";
               }
          }
          echo "</table>";


     	echo "<br /><a href='logouttest.php'>LogOut</a>";

     }
     else{
     	echo "Login Failed";
     	echo "<br /><a href='signupform.php'>SignUp</a>";
     	echo "<br /><a href='loginform.php'>Login</a>";

     }

mysql_close($conn);
?>
