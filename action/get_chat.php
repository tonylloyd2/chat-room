<?php 
    session_start();
    if(isset($_SESSION['session_token'])){
        include_once "../database/db_config.php";
        $outgoing_id = $_SESSION['session_token'];
        $incoming_id = mysqli_real_escape_string($connectdb, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.session_token = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')
                OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id";
        // $sql = "SELECT * FROM messages
        //         WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')
        //         OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}')
        //         ORDER BY msg_id desc ";
        $query = mysqli_query($connectdb, $sql);
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)) {
                if($row['outgoing_msg_id'] ===$outgoing_id ){
                    $output.='
                    <div id="your-chat" class="your-chat">
                    <p class="your-chat-balloon">'.$row["msg"].'</p>
                    <p class="chat-datetime">
                      <span class="glyphicon glyphicon-ok" style="color: green;"></span>
                      <span style="color: green;" class="glyphicon glyphicon-ok"></span>
                        '.$row['time_sent'].'
                    </p>
                  </div>';
                }
                else{
                    $output.='
                    <div id="friends-chat" class="friends-chat">
                    <div class="profile friends-chat-photo">
                      <img src="'.$row["image"].'" alt="">
                    </div>
                    <div class="friends-chat-content">
                      <p class="friends-chat-name"> '.$row['username'].'</p>
                      <p class="friends-chat-balloon"> '.$row['msg'].'</p>
                      <h5 class="chat-datetime">
                        '.$row['time_sent'].'
                    </div>
                  </div>  
                    ';
                }
            }
        }
        else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }
    else{
        header("location: ../auth/login.php");
    }

?>