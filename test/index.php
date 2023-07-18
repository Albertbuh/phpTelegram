<!Doctype html>

<html lang="en">
<head>

    <title> WebChat </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/global.css  ">
    <link rel="stylesheet" href="Styles/chatlistStyle.css  ">
    <link rel="stylesheet" href="Styles/extendedStyles.css  ">
    <link rel="stylesheet" href="Styles/message.css  ">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php
session_start();
$_SESSION["time"] = time();
?>

<div class="chat-list">
    <div class = "chat-list-header">
        <div class = "dropdown-menu">
            <img class = "icon-menu" src="Pictures/menu.svg" alt="">
            <div class = "dropdown-content">
                <div class = "dropdown-component">
                    <i class="material-icons">settings</i>
                    <a href="#"> Settings </a>
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
            <i class="material-icons">search</i>
            <input class="search-field" type="text" placeholder="Search">
        </div>
    </div>

    <div class = "chat-container" style="margin-top: 70px">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                12:27
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                3:54
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                3:54
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                3:54
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
    <div class = "chat-container">
        <div class = "icon-container">
            <img class="chat-icon" src="Pictures/img.png">
        </div>
        <div class = "explanation-container">
            <p class = "chat-name">New chat name</p>
            <p class = "chat-explanation"> User: message</p>

            <div class = "time">
                Thu
            </div>
        </div>
    </div>
</div>

<div class = "message-container">
    <img class="background" src="Pictures/Background.jpg" alt="">
    <div class="message-header">
        <div class="user-info">
            <div class="icon-container">
                <img class="chat-icon" src="Pictures/img.png" alt="">
            </div>
            <div class="explanation-container">
                <p class = "chat-name">New chat name</p>
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
    </div>
    <div class="message-footer">
        <button class="emoji">
            <i class="material-icons">mood</i>
        </button>
        <input class="message-field" type="text" placeholder="Message">
        <button class="sound">
            <i class="material-icons">mic</i>
        </button>
    </div>
</div>





 </body>
</html>
