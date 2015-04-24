<?php
include 'head.php';
?>
<h3><a href="library.php">Activity Event</a></h3>

<?php
include 'db.php';

//connect to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL DB: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM activity");


echo "<table class='table table-striped table-bordered' style='margin-top: 10px'><tr>
        <th>Number</th>
        <th>Date</th>
        <th>Start time</th>
        <th>End time</th>
        <th>Event name</th>
        <th>Age group</th>
        <th>Event type</th>
        <th>Event description</th>
      </tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Number'] . "</td><td>"
        ."<a href='items.php?number=".$row['Number']."'>". $row['Date_of_event'] . "</a></td><td>"
        . $row['Start_time_of_event'] . "</td><td>"
        . $row['End_time_of_event'] . "</td><td>"
        . $row['Event_name'] . "</td><td>"
        . $row['Age_group'] . "</td><td>"
        . $row['Event_type'] . "</td><td>"
        . $row['Event_description'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
include "foot.php";
?>
