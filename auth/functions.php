<?php
include "../database/db_config.php";
function random_id($length){   
    $alpha = array_merge(range('A','Z'));
    $rand_string = "";
    for ($i=0; $i <= $length ; $i++) { 
        $random = rand(1,2);
        if($random==1){
            $rand_string.=rand(0,9);
        }
        elseif($random==2){
            $rand_string.=$alpha[array_rand($alpha,1)];
        }
    }
    return $rand_string;
  }
function register($connectdb){

    $username = htmlspecialchars($_POST['username']);
    $fpassword = htmlspecialchars($_POST['fpassword']);
    $password = htmlspecialchars($_POST['spassword']);
    $session_token = random_id(10);
    $proceed = true;
    if (empty($fpassword) || empty($password)){
        $proceed = false;
        $data = [
            'error' => 'fields cannot be empty'
            ];
            $response = json_encode($data);
            echo($response); 
    }
    if ($fpassword != $password ) {
        $proceed = false;
        $data = [
            'error' => 'passwords dont match'
            ];
            $response = json_encode($data);
            echo($response);
    }
    $result_id=mysqli_query($connectdb,"SELECT * FROM users WHERE username='$username' ");
    if(mysqli_num_rows($result_id) > 0){
        $proceed = false;
        $data = [
        'error' => 'This username is already registered'
        ];
        $response = json_encode($data);
        echo($response);
    }
    if ($proceed) { 
        // $user_id = random_id(5);
        
        $media_root = "../media/profiles/";
        $upload_to = $media_root . basename($_FILES["image"]["name"]);
        $image_url = "../media/profiles/".basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($upload_to,PATHINFO_EXTENSION));
        
        $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false) {
            $uploadOk = 1;
          } 
          else {
            $data =["error" => "File is not an image."];
            $response = json_encode($data);
            echo($response);
            $uploadOk = 0;
          }
        
          if ($_FILES["image"]["size"] > 500000) {
          $data = ["error" => "Sorry, your file is too large."];
          $response = json_encode($data);
          echo($response);
          $uploadOk = 0;
         }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
          $data = ["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
          $response = json_encode($data);
          echo($response);
          $uploadOk = 0;
         }
        
        if ($uploadOk == 0) {
          $data = ["error" => "Sorry, your file was not uploaded."];
          $response = json_encode($data);
          echo($response);
         } 
        
        else {
           if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_to)) {
              $status = "offline";
            $query = mysqli_query($connectdb,"INSERT INTO users(session_token ,username , password , image , status)VALUES('$session_token' , '$username','$password' , '$image_url' , '$status')");
            if($query){
                  $data = [
                      'success' => 'Voter registered succesfully'
                    ]; 
                    $response = json_encode($data);
                    echo "<script>
                          alert('registration was successfull');
                          </script>";
                    
                    $myfile = fopen("../database/users_registry.txt", "a") or die("Unable to open file!");
                    $sql1 = "select * from users where username='{$username}' limit 1";
                    $result =  mysqli_query($connectdb,$sql1);
                    $user_data = mysqli_fetch_assoc($result);
                    $write_data = "";
                    $append = true;
                    while ($append) {
                    $write_data .= $user_data['username']." ";
                    $write_data .= $user_data['image']." ";
                    $append = false;
                    }
                    fwrite($myfile, $write_data."\n");
                    
                    echo "<script>
                          location.replace('login.php');
                          </script>";
                    
            }
            else if(!mysqli_query($connectdb,$query)){
              $data = [
                  'error' => 'There was an error in your registration please try again'
              ];
              $response = json_encode($data);
              echo($response);
            }                                     
          } 
          else {
            $data = ["error" => "Sorry, there was an error uploading your file."];
            $response = json_encode($data);
            echo($response);
          }
        }

      // backup users data in txt file 
    }
    else{
          echo "data is not inserted";
          header('Location:signup.php');
     }
}


function login($connectdb){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($connectdb , "SELECT username FROM users where username='$username' limit 1");
    if (mysqli_num_rows($query) > 0){
    $query2 = mysqli_query($connectdb , "SELECT * FROM users where username='$username' AND  password ='$password'  limit 1");
    if (mysqli_num_rows($query2) > 0 ) {
      $status = "online";
      $query3 = mysqli_query($connectdb , "UPDATE   users set status='$status' where username='$username' ");
        if($query3){
            $user_data = mysqli_fetch_assoc($query2);
            $_SESSION['session_token'] = $user_data['session_token'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['image'] = $user_data['image'];
            header("location:../chat/chat.php");
        }
    }
  }

}
function logout($connectdb){
  // session_start();
  $username = htmlspecialchars($_POST['username']);
  if (isset($_SESSION['session_token']) ){
    // $session_token = ""; 
    $status = "offline";
    // $_SESSION['session_token'] = $session_token;
     $query = mysqli_query($connectdb , "UPDATE  users SET status='$status' where username='$username'  limit 1");
     if ($query) {
        unset($_SESSION['session_token']);
        // session_destroy($_SESSION['session_token']);
        echo " <script> alert ('You have been logged out succesfully');
                      location.replace('../');
              </script>
        ";
     }
  }
  else {
     session_destroy();
     header("location:../index.php");
  }
  
}
function check_session(){
  $render_page = false;
if (isset($_SESSION['session_token'])) {
  $render_page == true;
}
else{
  echo "<script> alert ('You are not logged in');
                  location.replace('../auth/login.php');
        </script>";
}
}
?>
