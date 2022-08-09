<?php
session_start();
include "../database/db_config.php";
include "./functions.php";

if (isset($_POST["signup"])) {
    # code...
    // echo "<script>
    //         alert('registration was successfull');
    //        </script>";
    register($connectdb);
    


}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
    <style>
                        /* Made with love by Mutiullah Samim*/

            @import url('https://fonts.googleapis.com/css?family=Numans');

            html,body{
            background-image: url('../img/544750.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            }
            label{
                color: #FFC312;
                margin-right: 10px;
            }

            .label1{
                margin-right: 13.5%;
            }
            .label2{
                margin-right: 7.5%;
            }
            .label3{
                margin-right: 13%;
            }
            .container{
            height: 100%;
            align-content: center;
            }

            .card{
            height: 500px;
            margin-top: auto;
            margin-bottom: auto;
            width: 700px;
            background-color: rgba(0,0,0,0.5) !important;
            }

            .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
            }

            .social_icon span:hover{
            color: white;
            cursor: pointer;
            }

            .card-header h3{
            color: white;
            }

            .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
            }

            .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
            }

            input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;

            }

            .remember{
            color: white;
            }

            .remember input
            {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
            }

            .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
            }

            .login_btn:hover{
            color: black;
            background-color: white;
            }

            .links{
            color: white;
            }

            .links a{
            margin-left: 4px;
            }
            a{
                color: #FFC312;
            }
    </style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" >
					<div class="input-group form-group">
                    <label for="" class="label3"> Username : </label>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" required name="username" id="username">
						
					</div>
                    <div class="input-group form-group">
                        <label for="" class="label2"> Profile picture : </label>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="file" class="form-control" placeholder="profile picture" required name="image" id="image">
						
					</div>
					<div class="input-group form-group">
                    <label for="" class="label1"> Password : </label>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Enter password"required name="fpassword" id="fpassword">
					</div>
                    <div class="input-group form-group">
                    <label for="" class="label"> Cornfirm password : </label>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Cornfirm password" required name="spassword" id="spassword">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
                        <input type="checkbox" onclick="show_pass()">Check password
					</div></br>
					<div class="form-group">
						<input type="submit" value="Sign up" class="btn float-right login_btn" onclick="" name="signup">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="./login.php">Sign in</a>
				</div>
				<div class="d-flex justify-content-center" style="text-decoration-color: blueviolet;">
					<a href="#" >Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function show_pass(){
    var password1 = document.getElementById('password');
        if(password1.type == 'password'){
            password1.type = "text";
        }
        else if(password1.type == 'text'){
            password1.type = "password";
        }    
    var password = document.getElementById('fpassword');
        if(password.type == 'password'){
            password.type = "text";
        }
        else if(password.type == 'text'){
            password.type = "password";
        }
    
        var confirm_password = document.getElementById('spassword');
        if(confirm_password.type == 'password'){
            confirm_password.type = "text";
        }
        else if(confirm_password.type == 'text'){
            confirm_password.type = "password";
        }  
    }
    
</script>
</body>
</html>