<!DOCTYPE html>
<html>

<style>
  
  h1 {
    text-align: center top;
    padding-top: 8%;
    font-size: 40px;
    font-family: 'Times New Roman', Times, serif;
  }
  body {
    background-color: gray;
    background-image: url(notebook.jpg);
    background-position: center top;
    background-attachment: scroll;
    background-size: cover;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
  }
</style>

<body>
  <h1>Submit A Comment</h1>
  <h2>Self teaching myself HTML, CSS, PHP with MySQL.<br>Leave a comment to help me with database manipulation.</h2>
      <form action="/db.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" maxlength="20"><br><br>
        <textarea row="4" cols="50" maxlength="200" name="comment" id="comment" placeholder="Enter a comment..."></textarea><br>
        <input type="submit" value="Post"><br><br>
      </form>

      <table id="myTable" name="myTable">
      </table>
</body>

<?php
      $servername = "";
      $username = "";
      $password = "";
      $dbname = "";
      $conn = new mysqli($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM UserEntry ORDER BY Id DESC";

  $result = $conn->query($sql);

  $conn->close();
?>

<script>

while ($row = $result->fetch_assoc()){
  var table = document.getElementById("myTable");
  var row = document.createElement("tr");

  var userName = document.createElement("td");
  userName.textContent = $row['Name'];
  row.appendChild(userName);

  var comment = document.createElement("td");
  comment.textContent = $row['Comment'];
  row.appendChild(comment);

  table.appendChild(row);
}
  </script>

</html>