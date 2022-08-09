<?php 
session_start();
    if(isset($_SESSION['session_token'])){
        include "../database/db_config.php";
        $outgoing_id = $_SESSION['session_token'];
        $incoming_id = mysqli_real_escape_string($connectdb, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($connectdb, $_POST['message']);
        echo $message;
        if(!empty($message)){
            $sql = mysqli_query($connectdb, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die();
        }
    }else{
        header("location: ../auth/login.php");
    }


    
?>