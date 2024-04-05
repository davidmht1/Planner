<!DOCTYPE html>
<html>

<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully\r";

$sql = "CREATE TABLE IF NOT EXISTS Employee( 
  EmployeeName INT NOT NULL,
  monday DATETIME,
  tuesday DATETIME,
  wednesday DATETIME,
  thursday DATETIME,
  friday DATETIME,
  saturday DATETIME,
  sunday DATETIME
  )";

  $result = $conn->query($sql);

  if(!$result) {
    die("Error Creating Table". $conn->error);
  }

  $conn->close();
?>

<style>
  h1 {
    text-align: center;
  }

  table {
    margin-left: auto;
    margin-right: auto;
  }
</style>

<body>
  <h1>Weekly Schedule</h1>
  <table>
    <tr>
      <td>
        <label for="fname">Employee:</label>
        <input type="text" id="fname" name="fname"><br><br>
      </td>
      <td>
        <input type="button" id="addButton" name="addButton" value="Add Employee"><br><br>
      </td>
    </tr>
  </table>
  
    <table id="myTable"></table>
</body>

<script src="list_actions.js"></script>

</html>