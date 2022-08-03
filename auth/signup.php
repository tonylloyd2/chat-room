<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="../css/form.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <style>
form{
    position: center;
    align-content: center;
    justify-content: center;
}
.form{
    width: 400px;
    height: auto;
    color:var(--themeRed);
    font-family: 'roboto',sans-serif;
}

    </style>

</head>
<body style="background-color: blueviolet;">
<div class="fullcontainer banner" id="homesection">
    <header style="position: top ;">
                <div class="container">
                    <div class="logo" >
                        <img src="images/logo.png" alt="mchango logo">

                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="./home.php">Home</a>
                            </li>
                            <li>
                                <a href="./home.php">Gallery</a>
                            </li>
                            <li>
                                <a href="./home.php">Join us</a>
                            </li>
                            <li>
                                <a href="./signup.php">Sign up</a>
                            </li>
                            <li>
                                <a href="./login.php">Sign in</a>
                            </li>
                        </ul>

                    </nav>           </div>
            </header>
     
    <section>
        
    </section>        




    <form autocomplete="off" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="">
        <!-- <div class="form" > -->
            <h1 class="heading" style="color:aquamarine ; width: 100%;">SIGN UP</h1>
            <input type="text" placeholder="name" autocomplete="off" class="name" required name="name">
            <input type="email" placeholder="email" autocomplete="off" class="email" required name="email">
            <input type="password" placeholder="password" autocomplete="off" class="password" required name="password">
            <input type="file" name="image" id="image" placeholder="Profile Picture" accept="image/*" style="width:200px;"  required/>
            <button class="submit-btn" name="signup">register</button>
            <a href="login.php" class="link">already have an account? log in here</a>
        <!-- </div> -->
    </form>
    <script src="../js/form.js"></script>
   </div> 
</body>
</html>