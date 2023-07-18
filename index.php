<!Doctype html>

<html lang="en">
<head>
    <title> WebChat </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/global.css  ">
    <link rel="stylesheet" href="Styles/chatlistStyle.css  ">
    <link rel="stylesheet" href="Styles/extendedStyles.css  ">
    <link rel="stylesheet" href="Styles/message.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php
function checkBrowser(){
    $arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

    $agent = $_SERVER['HTTP_USER_AGENT'];

    $user_browser = '';
    foreach ($arr_browsers as $browser) {
        if (strpos($agent, $browser) !== false) {
            $user_browser = $browser;
            break;
        }
    }

    switch ($user_browser) {
        case 'MSIE':
            $user_browser = 'Internet Explorer';
            break;

        case 'Trident':
            $user_browser = 'Internet Explorer';
            break;

        case 'Edg':
            $user_browser = 'Microsoft Edge';
            break;
    }

    $mySQL = mysqli_connect("localhost", "root", "M2y4s6q8l#", "Messenger");
    $SQL = "UPDATE `browsers` SET `count` = `count` + 1 WHERE `name`='$user_browser'";;
    $request = mysqli_query($mySQL, $SQL);
    $SQL = "SELECT * FROM `browsers` ORDER BY count DESC";;
    $request = mysqli_query($mySQL, $SQL);
}

session_start();
$_SESSION["time"] = time();
checkBrowser();
if(!isset($_COOKIE["name"]) && !isset($_COOKIE["password"]) && !isset($_COOKIE["type"]))
    header("Location: /test/login.php");
if(isset($_COOKIE["name"]))
{
    $mysqli = new mysqli("localhost",  "root", "M2y4s6q8l#",  "Messenger");
    $time = time();
    $SQL = "INSERT INTO visits (timestamp) VALUES ('$time')";
    $mysqli->query($SQL);
}
?>

<div class="chat-list">
    <div class = "chat-list-header">
        <div class = "dropdown-menu">
            <img class = "icon-menu" src="Pictures/menu.svg" alt="">
            <div class = "dropdown-content">
                <div class = "dropdown-component">
                    <i class="material-icons">settings</i>
                    <a href="uploadAvatar.php"> Settings </a>
                </div>
                <div class = "dropdown-component">
                    <i class="material-icons">diamond</i>
                    <a href="#"> Something </a>
                </div>
                <div class = "dropdown-component">
                    <i class="material-icons">logout</i>
                    <a href="login.php"> Logout </a>
                </div>
            </div>
        </div>
        <div class="search-item">            
            <form method="post" action="setChat.php">                
                <input class="search-field" type="text" name="receiver" placeholder="Search">
                <input type="submit" value = "" hidden>
                <i class="material-icons">search</i>
            </form>
        </div>
    </div>
    <div style="margin-top: 70px;">
        <?php
        include("chatContainer.php");
        ?>
    </div>    
</div>

<div class = "message-container">
    <img class="background" src="Pictures/Background.jpg" alt="">
    
    <?php include("setHeader.php"); ?>
    <div style="overflow-y:auto;">
      <?php include("showMessages.php");?>
    </div>


    <?php 
        if(isset($_GET["receiver"])){
            $receiver = $_GET["receiver"];
            $send_message_form_action = "sendMessage.php?receiver=$receiver";          
    ?>
    <form class="message-footer" method="post" action=<?php echo $send_message_form_action?>>
        <button class="emoji">
            <i class="material-icons">mood</i>
        </button>
        <input class="message-field" type="text" name="message" placeholder="Message">
        <button class="sound">
            <i class="material-icons">mic</i>
        </button>
        <input type="submit" value="" hidden>
    </form>
    <?php } ?>
</div>
 </body>
</html>
