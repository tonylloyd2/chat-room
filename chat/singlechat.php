<?php
session_start();
include "../auth/functions.php";
include "../database/db_config.php";
check_session();


$user_id = mysqli_real_escape_string($connectdb, $_GET['receiver_session_token']);
$sql = mysqli_query($connectdb, "SELECT * FROM users WHERE session_token = '{$user_id}'");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
}else{
  header("location: ./chat.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chat App Template</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="bootstrap3.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="./singlechat.css">
  <style>
       .app {
    border: 3px solid #031426;
    width: 100%;
    margin: 2px auto;
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-rows: minmax(500px, calc(100vh - 100px));
    }.creator {
        /* padding-top:-20%; */
        row-gap: -3%;
        grid-template-rows: min-content;
        /* margin-top: 40px; */
        text-align: center;
        color: red;
        font-family: 'Courier New', Courier, monospace;
    }
  </style>
</head>
<body>
    <!-- RIGHT SECTION -->
  <div id="app" class="app">
    <section id="main-right" class="main-right">
      <!-- header -->
      <div id="header-right" class="header-right"> 
      <!-- profile picture -->
        <div id="header-img" class="profile header-img" style="">  
          <div class="back">
            <a href="./chat.php">
              <img src="../img/back.ico" height="20px" width="40px" alt="" >
            </a>
          </div>
          <div class="image">  
            <img src="<?php echo $row['image'] ?>"height="50px" width="100px" alt="" style="border-radius:50px;">
           
          </div>
        </div>
        <form action="" hidden class="main-form" method="post" style="margin-left: 30px;">
            <input type="text" hidden  class="input"hidden value="<?php echo $user_id; ?>">
        </form>
        <div class="name friend-name">
              
        </div>
        
        <!-- js -->
        <script>
          const form1 = document.querySelector(".main-form"),
          user_status = document.querySelector(".name"),
          input = form1.querySelector(".header-right .input").value;
          
          
          setInterval(() =>{
                            let xhr = new XMLHttpRequest();
                            xhr.open("POST", "../action/single_users.php", true);
                            xhr.onload = ()=>{
                              if(xhr.readyState === XMLHttpRequest.DONE){
                                  if(xhr.status === 200){
                                    let data = xhr.response;
                                    // if(!user_status.classList.contains("active")){
                                    user_status.innerHTML = data;
                                    //  console.log(data);
                                    // } 
                                  }
                              }
                            }
               xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.send("input="+input);
          }, 500);
        </script>
        <div class="some-btn"> 
          <span class="glyphicon glyphicon-option-vertical option-btn"></span>
        </div>
      </div>
      
      <!-- chat area -->
      <div id="chat-area" class="chat-area">
          <!-- FRIENDS CHAT TEMPLATE -->
          
          <!-- MY CHAT TEMPLATE -->
          
      </div>
        
      <!-- typing area -->
    <form class="typing-area" id="typing-area" style=""  enctype="multipart/form-data" name="typing-area" action="" autocomplete="off">
        <input class="outgoing_id" type="text" name="incoming_id"   value="<?php echo $_SESSION['session_token']; ?>"hidden >
        <input class="incoming_id" type="text" name="incoming_id"   value="<?php echo $user_id; ?>"hidden >
        <input class="input-field"  type="text" name="message" placeholder="Type a message here ????????.." autocomplete="off">
        
        <button id="send">
          <i class="glyphicon glyphicon-send send-btn" ></i>
        </button>
        
    </form>
    </section>
  </div>
<div class="creator" id="creator" style="">
        &copy;<script>
          document.getElementById('creator').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by and Coded by :  <a href="#" target="_blank">lloyd Tony</a>
</div>
    <!-- jQuey, Popper, BootstrapJS -->
    <script src="bootstrap3.3/js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap3.3/js/bootstrap.min.js"></script>
    <!-- <script src="../javascript/chat.js"></script> -->
    <script>
          

          const form = document.querySelector(".typing-area"),
          incoming_id = form.querySelector(".typing-area .incoming_id").value,
          inputField = form.querySelector(".typing-area .input-field"),
          sendBtn = form.querySelector(".typing-area button");
          chatBox = document.querySelector(".chat-area");
          
          form.onsubmit = (e)=>{
              e.preventDefault();
          }

          inputField.focus();
          inputField.onkeyup = ()=>{
              if(inputField.value != ""){
                  sendBtn.classList.add("active");
              }else{
                  sendBtn.classList.remove("active");
              }
          }
          sendBtn.onclick = ()=>{
              let xhr = new XMLHttpRequest();
              xhr.open("POST", "../action/send_chat.php", true);
              xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        inputField.value = "";
                        scrollToBottom();
                    }
                }
              }
              let formData = new FormData(form);
              xhr.send(formData);
          }
          chatBox.onmouseenter = ()=>{
              chatBox.classList.add("active");
          }

          chatBox.onmouseleave = ()=>{
              chatBox.classList.remove("active");
          }
          // function scrollToBottom(){
          //     chatBox.scrollTop = chatBox.scrollHeight;
          // }
          setInterval(() =>{
              let xhr = new XMLHttpRequest();
              xhr.open("POST", "../action/get_chat.php", true);
              xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                      let data = xhr.response;
                      chatBox.innerHTML = data; 
                      if(!chatBox.classList.contains("active")){
                          scrollToBottom();
                        }
                    }
                }
              }
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.send("incoming_id="+incoming_id);
              
          }, 500); 
  function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
 
    </script>
</body>
</html>