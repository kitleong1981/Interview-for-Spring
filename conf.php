<?php
    //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    session_start();
    $myserver="dcaidcom.ipagemysql.com";
    $myid="interview";
    $mypwd="Spring2022!!";
    $db="inteview";

    function sql_cmd($sql) {
        global $myserver,$myid,$mypwd, $db;
        $mysqli = new mysqli($myserver,$myid,$mypwd, $db);
        mysqli_query($mysqli,"SET CHARACTER SET UTF8");
        mysqli_query($mysqli,"SET NAMES UTF8");
        if ($mysqli->connect_error) { //Output any connection error
            die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }

        $result = $mysqli->query($sql);
        $mysqli->close();
        if ($result) {return true;} else {return false;}
    }

    function get_data($sql) {
        global $myserver,$myid,$mypwd, $db;
        $mysqli = new mysqli($myserver,$myid,$mypwd, $db);
        mysqli_query($mysqli,"SET CHARACTER SET UTF8");
        mysqli_query($mysqli,"SET NAMES UTF8");
        if ($mysqli->connect_error) { //Output any connection error
            die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }
        $result = mysqli_query($mysqli, $sql);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }
?>