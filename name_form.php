<!DOCTYPE html>
<html>

<head>
  <title>David's Website</title>
</head>
<style>

input[type=text], textarea,
select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

  div.scrollmenu {
    background-color: #153a49;
    overflow: auto;
    white-space: nowrap;
    text-align: center;
    margin: 40px;
    border-radius: 5px;
  }

  div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
    border-radius: 5px;
  }

  div.scrollmenu a:hover {
    background-color: #789e9d;
  }

  body {
    background-color: #f4eee5;
    font-family: Arial, Helvetica, sans-serif
  }

  div.scrollmenu,
  form {
    margin: 40px;
  }

  .myImage {
    position: relative;
    text-align: center;
    text-shadow: black 0px 0px 2px;
    font-size: 40px;
    height: 500px;
    background-image: url(minimalist_background.jpg);
    background-size: 2100px;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 25px;
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    outline: black;
    color: white;
  }
</style>

<body>

  <div class="scrollmenu">
    <a href="#top">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>

  <div class="myImage">
    <div class="centered">David's Website</div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" maxlength="20" width="200px;"><br><br>
    <label for="textarea">Comment:</label>
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