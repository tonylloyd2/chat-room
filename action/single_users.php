<?php
session_start();
    include_once "../database/db_config.php";
    $outgoing_id = $_SESSION['session_token'];
    $user_id = mysqli_real_escape_string($connectdb, $_POST['input']);
    // echo $user_id;
    $sql = "SELECT status , username  FROM users WHERE  session_token = '{$user_id}' limit 1";
    $query = mysqli_query($connectdb, $sql);
    $output = "";
    function status($row){ 
                $output = "";
                if ($row['status'] == "offline") {
                  $output.=' <i  style="color:blueviolet;">'. $row['status'] .'</i> ';
                  return $output;
                }
                elseif($row['status'] == "online") {
                  $output.=' <i  style="color:green;">'. $row['status'] .'</i> ';
                  return $output;
                }
                }
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
        $display="";
        $display .='<h5>'. $row['username'] .''."  [ ".' '.status($row).''." ]".'</h5>';
        // echo $row['username']." [ ".status($row)." ]";
        // echo $row['username']." [ ".status($row)." ]";
    //     $output =nodata();
        echo $display;
    }

    // }elseif(mysqli_num_rows($query) > 0){
    //     include_once "data.php";
                  
    // }
    // echo $output;
?>
<?php 
// echo $row['username']." [ ".status($row)." ]";
 ?>
