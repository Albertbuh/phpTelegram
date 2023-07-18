<?php
if(isset($_GET["receiver"], $_COOKIE["name"], $_POST["message"])){
    $sender = $_COOKIE["name"];
    $receiver = $_GET["receiver"];
    if($_POST["message"] === "")
        header("Location: /test/index.php?receiver={$receiver}");
    $message = $_POST["message"];
    $timestamp = date('Y-m-d H:i:s');

    $servername = "localhost";
    $username = "root";
    $password = "M2y4s6q8l#";
    $database = "Messenger";
    $connection = new mysqli($servername, $username, $password, $database) or die("not connected");
    
    
    $query = mysqli_query($connection, "INSERT INTO messages (sender, receiver, message, timestamp)
                                        VALUES ('$sender', '$receiver', '$message', '$timestamp')"); 
    if($query)
        echo "send ok";
    else
        echo "error in sending from $sender to $receiver message $message in $timestamp";
    header("Location: /test/index.php?receiver={$receiver}");
}
?>