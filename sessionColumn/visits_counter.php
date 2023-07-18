<?php

date_default_timezone_set('Europe/Minsk');
const N_SECONDS_IN_DAY = 24*60*60;

function get_visiting_times($time_border){
    $mysqli = new mysqli('localhost', 'root', 'M2y4s6q8l#', 'Messenger');
    $mysqli->set_charset('UTF8');
    $result = $mysqli->query("SELECT * FROM visits WHERE timestamp >= $time_border ORDER BY timestamp ASC");

    $visiting_times = [];
    if($result !== false){
        while($row = $result->fetch_assoc()){
            $visiting_times[] = $row['timestamp'];
        }
        $result->free();
    }

    $mysqli->close();
    return $visiting_times;
}

function get_start_day_time($time=null){
    if($time === null){
        $time = time();
    }

    $date = getdate($time);
    $day_start = mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']);
    return $day_start;
}

function get_n_day_visits(){
    $start_day_time = get_start_day_time();
    $visiting_times = get_visiting_times($start_day_time);

    return count($visiting_times);
}

function get_n_week_visits(){
    $date = getdate();
    $wday = $date['wday'];
    $start_week_time = get_start_day_time() - $wday*N_SECONDS_IN_DAY;
    $visiting_times = get_visiting_times($start_week_time);
    return count($visiting_times);
}

function get_n_month_visits(){
    $date = getdate();
    $start_month_time = mktime(0, 0, 0, $date['mon'], 1, $date['year']);
    $visiting_times = get_visiting_times($start_month_time);
    return count($visiting_times);
}

function get_n_year_visits(){
    $date = getdate();
    $start_year_time = mktime(0, 0, 0, 1, 1, $date['year']);
    $visiting_times = get_visiting_times($start_year_time);
    return count($visiting_times);
}

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

function get_visiting_plot(){
    $n_day_visits = get_n_day_visits();
    $n_week_visits = get_n_week_visits();
    $n_month_visits = get_n_month_visits();
    $n_year_visits = get_n_year_visits();

    $labels = ['Per day', 'Per week', 'Per month', 'Per year'];
    $visits = [$n_day_visits, $n_week_visits, $n_month_visits, $n_year_visits];

    

    $labels = convert_to_js_array($labels);
    $visits = convert_to_js_array($visits);
    
    $content = file_get_contents('index.html');
    $content = str_replace('{X_ARRAY}', $labels, $content);
    $content = str_replace('{Y_ARRAY}', $visits, $content);

    echo $content;
}

// var_dump(get_n_day_visits());
get_visiting_plot();