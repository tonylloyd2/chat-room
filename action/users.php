<?php
    session_start();
    include_once "../database/db_config.php";
    $outgoing_id = $_SESSION['session_token'];
    $sql = "SELECT * FROM users WHERE NOT session_token = '{$outgoing_id}' ORDER BY id DESC";
    $query = mysqli_query($connectdb, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        include_once "./data.php";
        $output =nodata();
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
                  
    }
    echo $output;
?>