<?php
    session_start();
    include_once "../database/db_config.php";

    $outgoing_id = $_SESSION['session_token'];
    
    // echo $outgoing_id;
    
    $searchTerm = mysqli_real_escape_string($connectdb, $_POST['searchTerm']);
  
    // echo $searchTerm;
    $sql = "SELECT * FROM users WHERE NOT session_token = '{$outgoing_id}' AND username LIKE '%{$searchTerm}%' ";
    $sql2 = "SELECT * FROM messages WHERE msg LIKE '%{$searchTerm}%' ";
    $output = "";
    $query = mysqli_query($connectdb, $sql);
    $query2 = mysqli_query($connectdb, $sql2);
    if((mysqli_num_rows($query) > 0) || (mysqli_num_rows($query2) > 0)  ){
        include_once "./data.php";
    }else{
        include_once "./data.php";
        $output .= nodata();
    }
    echo $output;
?>