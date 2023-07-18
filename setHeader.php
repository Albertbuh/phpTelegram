<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET["receiver"]))
{
    $name = $_GET["receiver"];
    $image_path = "Pictures/avatars/".$name."_avatar.png"; 
?>

<form class="message-header" method="post" enctype="multipart/form-data" 
      action="uploadAvatar.php?imagepath=<?php echo $image_path;?>">
        <div class="user-info" >
            <div class="icon-container" >
                <img class="chat-icon" src=<?php echo $image_path; ?> alt="">
            </div>
            
            <div class="explanation-container">
                <p class = "chat-name"><?php echo $name; ?></p>
                <p class = "chat-explanation"> Last seen recently</p>
            </div>
        </div>
        <div class="additional-settings">

            <div class = "component">
                <i class="material-icons" href="#">search</i>
            </div>
            <div class = "component">
                <i class="material-icons" href="#">call</i>
            </div>
            <div class = "component">
                <i class="material-icons" href="#">more_vert</i>
            </div>
        </div>
    </form>
<?php } ?>
</body>
</html>
