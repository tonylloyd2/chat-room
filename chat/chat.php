<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- echo name of logged in user -->
  <title>Chat Room</title>
  <link rel="stylesheet" href="bootstrap3.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="chat.css">
</head>
<body>
  <div id="app" class="app">

    <!-- LEFT SECTION -->

    <section id="main-left" class="main-left">
      <!-- header -->
      <div id="header-left" class="header-left">
      <!-- <div id="self-info" class="self-info">
      </div> -->
      
        <!-- photo -->
        <div class="profile your-photo">
          <img src="images/ava4.jpg" alt="">
        </div>
        <!-- name -->
        <h4 class="name your-name">Iqbal Taufiq</h4>
        <!-- setting btn -->
        <!-- <span class="glyphicon glyphicon-cog"></span> -->
        <!-- <span class="glyphicon glyphicon-menu-hamburger hamburger-btn"></span> -->
        <span class="glyphicon glyphicon-search search-btn" style="padding-left:10%;">
        <input type="text" style="border-radius: 20px;" hidden>
        </span>
        <span class="glyphicon glyphicon-option-vertical option-btn">
          <ul hidden>
            <li>hello</li>
            <li>wewe</li>
          </ul>
        </span>
      
      </div>

      <!-- chat list -->
      <div id="chat-list" class="chat-list">
        <!-- user lists -->
        <div id="friends" class="friends">
          <!-- photo -->
          <div class="profile friends-photo">
            <img src="images/ava2.jpg" alt="">
          </div>
          
          <div class="friends-credent">
            <!-- name -->
            <span class="friends-name">Mario Gomez</span>
            <!-- last message -->
            <span class="friends-message">Crap! I forgot my shoes. Can you bring extra pair for me?</span>
          </div>
          <!-- notification badge -->
          <span class="badge notif-badge">7</span>
        </div>

        <div id="friends" class="friends">
          <!-- photo -->
          <div class="profile friends-photo">
            <img src="images/ava3.jpg" alt="">
          </div>
          
          <div class="friends-credent">
            <!-- name -->
            <span class="friends-name">Andre Silva</span>
            <!-- last message -->
            <span class="friends-message">How are you?</span>
          </div>
          <!-- notification badge -->
          <span class="badge notif-badge">999</span>
        </div>
      <!-- self-profile -->
      
    </section>

    <!-- RIGHT SECTION -->
    <section id="main-right" class="main-right">
      <!-- header -->
      <div id="header-right" class="header-right">
        <!-- profile pict -->
        <div id="header-img" class="profile header-img">
          <img src="images/ava2.jpg" alt="">
        </div>

        <!-- name -->
        <h4 class="name friend-name">Mario Gomez</h4>
        <!-- some btn -->
        <div class="some-btn">
          <!-- <span class="glyphicon glyphicon-facetime-video"></span>
          <span class="glyphicon glyphicon-earphone"></span> -->
          <span class="glyphicon glyphicon-option-vertical option-btn"></span>
        </div>
      </div>

      <!-- chat area -->
      <div id="chat-area" class="chat-area">
        <!-- chat content -->

        <!-- FRIENDS CHAT TEMPLATE -->
        <div id="friends-chat" class="friends-chat">
          <div class="profile friends-chat-photo">
            <img src="images/ava2.jpg" alt="">
          </div>
          <div class="friends-chat-content">
            <p class="friends-chat-name">Mario Gomez</p>
            <p class="friends-chat-balloon">Yo Dybala!</p>
            <h5 class="chat-datetime">Sun, Aug 30 | 15:41</h5>
          </div>
        </div>

       

        <!-- FRIENDS CHAT TEMPLATE -->
        <div id="friends-chat" class="friends-chat">
          <div class="profile friends-chat-photo">
            <img src="images/ava2.jpg" alt="">
          </div>
          <div class="friends-chat-content">
            <p class="friends-chat-name">Mario Gomez</p>
            <p class="friends-chat-balloon">Crap! I forgot my shoes. Can you bring extra pair for me?</p>
            <h5 class="chat-datetime">Sun, Aug 30 | 15:41</h5>
          </div>
        </div>

        <!-- YOUR CHAT TEMPLATE -->
        <div id="your-chat" class="your-chat">
          <p class="your-chat-balloon">sure m8</p>
          <p class="chat-datetime"><span class="glyphicon glyphicon-ok"></span> Sun, Aug 30 | 15:45</p>
        </div>

        <!-- FRIENDS CHAT TEMPLATE -->
        <div id="friends-chat" class="friends-chat">
          <div class="profile friends-chat-photo">
            <img src="images/ava2.jpg" alt="">
          </div>
          <div class="friends-chat-content">
            <p class="friends-chat-name">Mario Gomez</p>
            <p class="friends-chat-balloon">Thanks!</p>
            <h5 class="chat-datetime">Sun, Aug 30 | 15:41</h5>
          </div>
        </div>


      </div>

      <!-- typing area -->
      <div id="typing-area" class="typing-area" style="margin-left: 0px;"> 
        <!-- input form -->
        
        <!-- attachment btn -->
        <div class="attach-btn" style="float:left ; margin-left: 0px;">
          <span class="glyphicon glyphicon-paperclip file-btn" style="margin-left: 0px;"></span>
          <span class="glyphicon glyphicon-camera"></span>
          <span class="glyphicon glyphicon-picture"></span>
          <input id="type-area" class="type-area" size="30" placeholder="Type something..." style="border-color: green; border-style:double ;;">
          <span class="glyphicon glyphicon-send send-btn" style="float: right;"></span>
        </div>
        <!-- send btn -->
        
      </div>
    </section>
  </div>

  <div id="creator" class="creator">
    &copy; <script>
          document.getElementById('creator').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designed by and Coded by :  <a href="#" target="_blank">lloyd Tony</a>
  </div>

    <!-- jQuey, Popper, BootstrapJS -->
    <script src="bootstrap3.3/js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap3.3/js/bootstrap.min.js"></script>
</body>
</html>