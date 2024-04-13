<!DOCTYPE html>
<html>

<head>
  <title>David's Website</title>
</head>
<style>
  .title,
  form {
    margin: 70px;
  }

  .title {
    font-size: 30px
  }

  .container {
    position: relative;
    text-align: center;
    text-shadow: 5px;
    font-size: 30px;
    height: 500px;
    background-size: 1500px;
    background-position: center;
    background-image: url(minimalist_background.jpg);
    
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

<body>
  <div class="title">
    <p>Sample Text</p>
  </div>

  <div class="container">
    <div class="centered">Sample Text</div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" maxlength="20"><br><br>
    <textarea row="4" cols="50" maxlength="20" name="comment" id="comment"
      placeholder="Enter a comment..."></textarea><br>
    <input type="submit" value="Post"><br><br>
  </form>
  </div>

  <table id="myTable" name="myTable">
  </table>
</body>

<?php
$servername = "";
$username = "admin";
$password = "";
$dbname = "main-aws-db";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM UserEntry ORDER BY Id DESC";

$result = $conn->query($sql);

// Create the HTML table
echo '<table>';
echo '<tr><th>User</th><th>Comment</th></tr>';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td width=400px>' . $row['Comment'] . '</td>';
    echo '</tr>';
}
echo '</table>';

$conn->close();
?>

<script>
  $(document).ready(function () {
    $('#myForm').submit(function (e) {
      e.preventDefault(); // prevent default form submission
      $.ajax({
        url: '/Planner/db.php',
        type: 'post',
        data: $('#myForm').serialize(),
        success: function () {
          window.location.reload();
        }
      });
    });
  });
</script>

</html>