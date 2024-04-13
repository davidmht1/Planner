<?php

$servername = "";
$username = "admin";
$password = "";
$dbname = "main-aws-db";
$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['name'];
$comment = $_POST['comment'];

$sql = "INSERT INTO UserEntry (Name, Comment)
VALUES('$username','$comment')";

$result = $conn->query($sql);
$conn->close();

if (!$result) {
  die("Uh-oh, there was an error adding your comment" . $conn->error);
} 
else {
  echo ($username . " Your Comment was succesfully added! Returning to main page.");
  header('Refresh: 2, URL=name_form.php');
}

?>