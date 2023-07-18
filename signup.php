<?php
$servername = "localhost";
$username = "root";
$password = "M2y4s6q8l#";
$database = "Messenger";

$connection = new mysqli($servername, $username, $password, $database) or die("not connected");

if(isset($_POST["name"], $_POST["password"]))
{
$name = $_POST["name"];
$user_info = array($_POST["name"], md5($_POST["password"]));
$query = mysqli_query($connection, "SELECT name FROM authorization WHERE name='".$name."'");
if($query->num_rows == 0)
{
  $sql_insert = "INSERT INTO authorization (name, password, type) VALUES ('$user_info[0]', '$user_info[1]', 'user')";
  if($connection->query($sql_insert) === TRUE)
  {
    setcookie("name", $user_info[0], time() + 3600 * 24);
    setcookie("password", $_POST["password"], time() + 3600 * 24);

    $subject = '=?UTF-8?B?' . base64_encode('New user') . '?=';
    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/plain; charset=UTF-8\r\n";
    //$header .= "Content-transfer-encoding: quoted-printable";
    $header .= "From: albertbuhovets@mail.ru\r\n";
    mail("albertbuhovets@mail.ru", $subject, "New user '$name' try your chat bro ;)", $header);
    header('Location: /test/index.php'."?sender=$name");
  }
  else
    echo "Failure";
}
else
    echo "Such user in database";
}
else
  echo "aboba"
?>