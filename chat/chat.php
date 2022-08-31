<?php
session_start();
include "../database/db_config.php";
include "../auth/functions.php";

check_session();

if (isset($_POST['logout'])) {
  logout($connectdb);
}
$unique_id =$_SESSION['session_token'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chat App</title>
  <link rel="stylesheet" href="bootstrap3.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="./chat.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <style>

    .app {
    border: 3px solid #031426;
    width: 100%;
    margin: 2px auto;
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-rows: minmax(500px, calc(100vh - 100px));
    }.creator {
        margin-top: 35px;
        text-align: center;
        color: red;
        font-family: 'Courier New', Courier, monospace;
    }
    button{
      background-color: #031426;
      border-style: hidden;
    }
    .users {
        background: #031426;
        display: grid;
        grid-template-rows: 1fr 6fr 1fr;
        grid-auto-flow: row;
    }
    a{
      margin-top: 0%;
    }
  </style>
</head>
<body>
<div id="app" class="app">
  <section id="main-left" class="main-left" style="width:100%;">
    <!-- <section id="main-left" class="users" style="width:100%;"> -->
          <!-- header -->
          <div class="search" id="header-left">
            <div id="header-left" class="header-left">
              <span class="uil uil-bars glyphicon hamburger-btn" style="padding-left:50%;margin-top: 10px; "></span>
              <input type="text" value="<?php $_SESSION['session_token'] ?>" hidden>
              <div class="search" style="margin-right:-500%; margin-left:10px;">
                <input type="text" style="width:90%;margin-top: 15px; height: 30px;border-radius: 30px ;"placeholder="Search ...."> 
              </div>
              <button hidden><i class="glyphicon glyphicon-search search-btn"></i></button>  
                <!-- <span class="" style="margin-left: 90%; margin-top: 10px;"></span> -->
                <!-- <span class="glyphicon glyphicon-option-vertical option-btn"></span> -->
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <span>
                  <button name="logout" type="submit"style="float: right; width:22% ;margin-top: 20px;
                   height:25px; background-color: red; color:white; border-radius:20px;">logout</button>
                </span>
                <input type="text" value="<?php echo $_SESSION['username'] ;?>" hidden name="username">
              </form>
            </div> 
            
          </div>
          
          
          <!-- chat list -->
          <div id="chat-list" class="chat-list">
            <!-- user lists -->
            <!-- code in action/users.php -->
          </div>

          <!-- self-profile -->
          <div id="self-info" class="self-info" style="">
            <!-- photo -->
            <div class="profile your-photo" style="float: left;">
            <img src="<?php echo $_SESSION['image'] ?>" alt="" style="" >
            </div>
            <!-- name -->
            <h4 class="name your-name"><?php echo $_SESSION['username']; ?></h4>
            <!-- setting btn -->
            <i class="uil "></i>
            <span class=" glyphicon uil-cog" style="margin-right:10px"></span>
          </div>
    <!-- </section>  -->
  </section>
</div>
<div class="creator" id="creator" style="">
        &copy; <script>
          document.getElementById('creator').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by and Coded by :  <a href="#" target="_blank">lloyd Tony </a> && <a href="#" target="_blank">Profilin@dev</a>
</div>
    <!-- jQuey, Popper, BootstrapJS -->

<script src="bootstrap3.3/js/jquery-3.3.1.min.js"></script>
<script src="bootstrap3.3/js/bootstrap.min.js"></script>
<script src="../javascript/users.js"></script>
<script>
 

</script>
</body>
</html>