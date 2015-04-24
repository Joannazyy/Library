<?php
$ISBN = $_POST["ISBN"];
$Book_title = $_POST["Book_title"];
$Date_of_publication = $_POST["Date_of_publication"];
$Author_name = $_POST["Author_name"];
$Category = $_POST["Category"];
//TODO: Insert some validation here
if($Book_title=='' || $Category==''){
  echo "Wrong input!";
  exit;
}
include 'db.php';

//connect to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL DB: " . mysqli_connect_error();
    exit;
}
$query = "INSERT INTO book (ISBN, Book_title, Date_of_publication, Author_name, Category)
     VALUES ('$ISBN', '$Book_title', '$Date_of_publication','$Author_name','$Category');";
mysqli_query($con,$query);
mysqli_close($con);


//redirect
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'library.php';

header("Location: http://$host$uri/$extra");
exit;
