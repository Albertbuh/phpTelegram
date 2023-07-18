<?php
    $mysqli = new mysqli("localhost",  "root", "M2y4s6q8l#",  "Messenger");
    
    $timestamp =  date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
    $SQL = "INSERT INTO sessions (timestamp) VALUES ('".$timestamp."')";
    $mysqli->query($SQL);
    
    $period = $_GET['period'] ?? 'day';
    
    switch($period){
        case 'day':
            $SQL = "SELECT COUNT(*) as count, timestamp
                    FROM sessions 
                    WHERE DATE(timestamp) = CURDATE()
                    GROUP BY UNIX_TIMESTAMP(timestamp) DIV 300";
            $timestr = 'Y-m-d H:i:s';         
            $name = 'Day';        
            $interval = 30;
            $intervalType = 'minute';
            $format = "hh:mm tt";
            break;
        case 'week':
            $SQL = "SELECT COUNT(*) as count, timestamp
                    FROM sessions 
                    WHERE YEARWEEK(timestamp)=YEARWEEK(NOW())
                    GROUP BY UNIX_TIMESTAMP(timestamp) DIV 21600";
            $timestr = 'D M d Y H:i:s';         
            $name = 'Week';        
            $interval = 6;        
            $intervalType = 'hour';
            $format = "D MMMM hh:mm tt";
            break;
        case 'month':
            $SQL = "SELECT COUNT(*) as count, timestamp
                    FROM sessions 
                    WHERE MONTH(timestamp)=MONTH(NOW())
                    GROUP BY DAY(timestamp)";
            $timestr = 'D M d Y ';        
            $name = 'Month';           
            $interval = 3;        
            $intervalType = 'day'; 
            $format = "DD MMM";
            break;
        case 'year':
            $SQL = "SELECT COUNT(*) as count, timestamp
                    FROM sessions 
                    WHERE YEAR(timestamp)=YEAR(NOW())
                    GROUP BY MONTH(timestamp)";
            $timestr = 'M 01 Y ';         
            $name = 'Year';        
            $interval = 3;        
            $intervalType = 'month';
            $format = "DD MMM";
            break;    
    }

    $result = $mysqli->query($SQL);
    $currentDates = [];
    $rows = [];
    while($row = $result->fetch_assoc()){
      $currentDates[] = date($timestr, (strtotime($row['timestamp'])) );
      $rows[] = $row['count'];
    }


    $content = file_get_contents("graph.html");
    $currentDatesJs = convert_to_js_array($currentDates);
    $rowsJs = convert_to_js_array($rows);
    $content = str_replace('{X_ARRAY}', $currentDatesJs, $content);
    $content = str_replace('{Y_ARRAY}', $rowsJs, $content);
    $content = str_replace('{INTERVAL}', $interval, $content);
    $content = str_replace('{INTERVAL_TYPE}', $intervalType, $content);
    $content = str_replace('{FORMAT}', $format, $content);
    $content = str_replace('{NAME}', $name, $content);

    echo $content;

    function convert_to_js_array($arr){
        if(count($arr) == 0){
            return '[]';
        }
    
        $res = '[';
        $res .= "'" . $arr[0] . "'";
    
        for($i = 1; $i < count($arr); $i++){
            $res .= ',';
            $res .= "'" . $arr[$i] . "'";
        }
    
        $res .= ']';
        return $res;
    }
?>
