<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <style>
        .element {
            display: flex;
            margin: 50px auto;
            flex-direction: column;
        }
        .table_name {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        }
        td {
            width: 100%;
            border: solid 1px black;
        }
        tr {
            display: inline-flex;
            width: 100%;
            justify-content: center;
        }

        body {
                margin: 0;
                padding: 0;
                font-family: Roboto;
                background:linear-gradient(120deg, #0d608d, #731396);
                height: 100vh;
                overflow: hidden;
            }
        h1 {
            position:absolute;
            top:15%;
            left:50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 48px;

        }
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background-color: var(--color-default-background);
            border: white;
            border-style: solid;
            border-radius: 10px;
        }
        input[type="submit"]{
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30%;
            height: 50px;
            border: 1px solid;
            background: #2665d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            transition: .5s;
        }

        tr {
            color:white;
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px 10px 20px;
        }
        td{
            border:none;
            text-align: center;
            border-bottom: #e9f4fb;            
        }
    </style>
</head>
<body>
<?php

checkBrowser();
function checkBrowser()
{
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
if ($request) {
    $data = mysqli_fetch_all($request);
    echo '<h1> Preferred browsers by users </h1>';
    echo '<table class="center" align="center" width="100%"><tr>
        <td><b>Browser</b></td>
        <td><b>Count</b></td>';
    foreach ($data as $item) {
        echo '<tr>
            <td>', $item[1],'</td>
            <td>', $item[2],'</td>
            </tr>';
    }
    echo '</table>';
    echo  '<form action="/test/index.php"> <input type="submit" value="Back"></form>';
}
}
