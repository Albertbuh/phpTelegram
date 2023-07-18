<?php
$servername = "localhost";
$username = "root";
$password = "M2y4s6q8l#";
$database = "Messenger";

$connection = new mysqli($servername, $username, $password, $database) or die("not connected");

if(isset($_POST["name"], $_POST["password"]))
{
$user_info = array($_POST["name"], md5($_POST["password"]));
$query = mysqli_query($connection, "SELECT name FROM authorization WHERE name='".$name."'");
if($query->num_rows == 0)
{
  $sql_insert = "INSERT INTO authorization (name, password, type) VALUES ('$user_info[0]', '$user_info[1]', 'user')";
  if($connection->query($sql_insert) === TRUE)
    header('Location: /test/index.php');
  else
    echo "Failure";
}
else
    echo "Such user in database";
}
else
  echo "aboba"
?>