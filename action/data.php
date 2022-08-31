<?php
function nodata(){
?>
  <input type="text" value="" name="receiver_username" hidden>
    <button id="friends" class="friends" style="width: 100%;" name="single_chat">
      <!-- photo -->
      <div class="profile friends-photo">
        <img src="" alt="" name="image">
      </div>
      <div class="friends-credent" style="margin-top: 10px;">
        <!-- name -->
        <span class="friends-name"> 
          <p name="username" style="color:blueviolet;"></p> 
        </span>
        
        <span class="friends-message">No user or message related found </span>
      </div>
      <!-- notification badge -->
      <span class="badge notif-badge" style="background-color:green">0</span>
    </button>
  <?php
      }
    ?>
    
<?php
  include "../database/db_config.php";
  while($row = mysqli_fetch_assoc($query)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = '{$row['session_token']}'
             OR outgoing_msg_id = '{$row['session_token']}') AND (outgoing_msg_id = '{$outgoing_id} '
                OR incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($connectdb, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
    (strlen($result) >40) ? $msg =  substr($result, 0, 40) . '...' : $msg = $result;
    if(isset($row2['outgoing_msg_id'])){
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }
    // ($row['status'] == "offline") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['session_token']) ? $hid_me = "hide" : $hid_me = "";  
    if ($row['status'] == "offline") {
        $offline = "";
        
      $offline .= '<span class="badge notif-badge" 
      style="background-color: red;float:right ; border-radius:10px;color:white ;">offline<img src="../img/offline_icon.jpg" height="10px" alt="" srcset=""></span>';
    }
    else{
      $offline = ""; 
      $offline .= '<span class="badge notif-badge" 
      style="background-color: green;float:right;border-radius:10px;color:white">online<img src="../img/online_icon.jpg" height="10px" alt="" srcset=""></span>';
    }
    $output.='
    
      <a href="./singlechat.php?receiver_session_token='.$row['session_token'].'">
      <input type="text" value="'. $row['username'] .'" name="receiver_username" hidden>
        <button id="friends" class="friends" 
        style="width: 100%;" name="single_chat">
          <!-- photo -->
           
            <div class="profile friends-photo">
              <img src="'. $row['image'] .'" alt=""
               name="image" style=""> 
          </div>
          <div class="friends-credent" style="">
            <!-- name -->
            <span class="friends-name" style="margin-bottom:0px"> 
              <p name="username" 
              style="color:blueviolet;
               margin-left:1px;" >'. $row['username'] .'</p> 
               
            </span>
            
            <span class="friends-message"
            style="margin-top:0px" 
            ><p>'. $you . $msg .'</p></span>
          </div>
          <!-- notification badge -->

          <span class="notif-badge" style ="border-radius:20px">'. $offline .' </span>
          <span class="notif-badge" style="margin-right:10px;border-radius:20px;width:20px">2</span>
        </button>
      </a>
     ';
}
?>