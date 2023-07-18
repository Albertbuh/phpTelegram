<?php
$servername = "localhost";
$username = "root";
$password = "M2y4s6q8l#";
$database = "Messenger";

$connection = new mysqli($servername, $username, $password, $database) or die("not connected");

$admin_list = array("root");
if(isset($_POST["name"], $_POST["password"]))
{

$user_info = array($_POST["name"], $_POST["password"]);
$sql_connect = "SELECT * FROM authorization";
$result = mysqli_query($connection, $sql_connect);

$IsInDatabase = false;
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result)){
    if($row["name"] === $user_info[0])
    {
     $IsInDatabase = true; 
     if($row["password"] == md5($user_info[1]))
     {
      if($row["type"] === "user")
      {
        setcookie("name", $user_info[0], time() + 3600 * 24);
        setcookie("password", $user_info[1], time() + 3600 * 24);
        setcookie("type", $row['type'], time() + 3600 * 24);
      }
      else
      {
        setcookie("type", $row["type"], time() + 300);

        if(isset($_COOKIE["name"])){
          unset($_COOKIE["name"]);
          setcookie("name", "", time()-3600);
        }
        if(isset($_COOKIE["password"])){
          unset($_COOKIE["password"]);
          setcookie("password", "", time()-3600);
        }
      }
      header('Location: /test/index.php');
     }
     else
       echo "<h1> Incorrect password</h1>";
    }
  }
}
if(!$IsInDatabase)
  echo "<h1> No such user in database </h1>";
}
  
?>