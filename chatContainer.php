<!DOCTYPE html>
<body>

<?php
if(isset($_COOKIE["name"])){


$servername = "localhost";
$username = "root";
$password = "M2y4s6q8l#";
$database = "Messenger";

$connection = new mysqli($servername, $username, $password, $database) or die("not connected");

$query = mysqli_query($connection, "SELECT * FROM authorization");

while($row = mysqli_fetch_array($query)):
if($row["type"] === "user" && $row["name"] !== $_COOKIE["name"]):
    $image_path = "Pictures/avatars/".$row["name"]."_avatar.png";
?>
<form action="">
<div class = "chat-container" style = "margin-top: 5px">
        <div class = "icon-container">
            <img class="chat-icon" src=<?php echo $image_path; ?>>
        </div>
        <div class = "explanation-container">
            <p class = "chat-name"> <?php echo $row["name"] ?></p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                12:27
            </div>
        </div>
</div>
</form>

<?php 
endif;
endwhile;
}?>
</body>