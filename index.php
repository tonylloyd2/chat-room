<?php
session_start();
if(isset($_SESSION['session_token'])){
   header("location:./chat/chat.php");
}
else {
    header("location:./auth/login.php");
}
?>