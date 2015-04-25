<?php
include 'head.php';
?>
<h3><a href="library.php">Activity Event</a></h3>

<button class="btn btn-success admin" style="margin-left: 10px" onclick="showLibraryForm()">Activity Name</button>

<form action="" method="get" class="form-inline" style="display: inline-block;margin-left: 10px">
    <input type="text" class="form-control" name="query" value="">
    <button type="submit" class="btn btn-primary">Search</button>
</form>


<?php
include 'db.php';

//connect to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL DB: " . mysqli_connect_error();
}

if(isset($_GET["query"])){
    $query = $_GET["query"];
    $result = mysqli_query($con, "SELECT * FROM activity WHERE Event_name LIKE '%$query%'");
}
else{
    $result = mysqli_query($con, "SELECT * FROM activity");
}

#$result = mysqli_query($con, "SELECT * FROM activity");


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
?>
