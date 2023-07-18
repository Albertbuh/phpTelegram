<?php

if(isset($_COOKIE["type"]) && $_COOKIE["type"] === "user"){
    $receiver = null;
    if(isset($_POST["receiver"])){
        $receiver = $_POST["receiver"];
    }
    header("Location: /test/index.php?receiver={$receiver}");
}
else if(isset($_COOKIE["type"], $_POST["receiver"]) && $_COOKIE["type"] === "admin")
{
    $command = $_POST["receiver"];
    switch($command)    
    {
        case "/statc":
            header("Location: /test/sessionColumn/visits_counter.php");
            break;
        case "/statl":
            header("Location: /test/sessionLine/sessionStatistic.php");
            break;
        case "/brows":
            header("Location: /test/browserStat/browserStatistic.php");
            break;
    }
    
}
else
    header("Location: /test/index.php?undefiend=$command");
?>