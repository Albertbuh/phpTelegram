<!DOCTYPE html>
<head>
    <style>
    .message {
        align-items:center;
        width: auto;
        max-width: 400px;
        min-width: 100px;
        background: var(--color-default-background);
        z-index: 0;
        height: auto;
        padding: 5px 0px 5px 5px;
        margin: 5px 5px 5px 5px;
        position:relative;
        border: solid 3px white;
        border-radius: 10px;        
    }
    .message .user-info {
        display: grid;
        height: 60px;
        grid-template-columns: 60px 1fr;
        margin-top: 5px;
        cursor: pointer;
        white-space: nowrap;
    }

    .message .user-info .explanation-container {
        line-height: 4px;
        margin-left: 10px;
        align-items: center;
    }

    .message .user-info .explanation-container .user-name {
        font-size: 24px;
        font-weight: bold;
    }

    .message .user-info .explanation-container .user-message {
        font-size: 20px;
    }

    .message .time{
        position: absolute;
        font-size: 12px;
        bottom: 2%;
        right: 4px;
    }
    </style>
</head>
<body>
<?php
function get_time(string $timestamp){
    $format = "Y-m-d H:i:s";
    $date = DateTime::createFromFormat($format, $timestamp);
    return $date->format('m-d') . "<br>" .$date->format('H:i');
}

if(isset($_GET["receiver"], $_COOKIE["name"])){
    $servername = "localhost";
    $username = "root";
    $password = "M2y4s6q8l#";
    $database = "Messenger";
    $connection = new mysqli($servername, $username, $password, $database) or die("not connected");
    
    $sender = $_COOKIE["name"];
    $receiver = $_GET["receiver"];
    $query = mysqli_query($connection, "SELECT * FROM messages WHERE sender='$sender' 
                                                                 AND receiver='$receiver'
                                                                 OR sender='$receiver'
                                                                 AND receiver='$sender'");
    while($row = mysqli_fetch_array($query)){
        $message = $row["message"];
        $time = $row["timestamp"];
        $message_sender = $row["sender"];
        $message_receiver = $row["receiver"];
?>

<div class="message"> 
    <div class="user-info">
    <div class="explanation-container">
        <p class = "user-name"><?php echo "$message_sender:"; ?></p>
        <p class = "user-message"><?php echo $message; ?></p>
    </div>
    <div class="time">
        <?php echo get_time($row["timestamp"]); ?>
    </div>
</div>
</div>
        
<?php
    }
}
?>
</body>