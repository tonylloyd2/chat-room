//form loading animation
const form=[...document.querySelector('.form').children]; 
form.forEach((item, i) =>{
    setTimeout(()=>{
        item.style.opacity=1;
    },i*100);
    })
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
    function validate_password(){
        var password = document.getElementById('fpassword').value;
        var confirm_password = document.getElementById('spassword').value;

        var check = true
     //check empty password field  
      if(password == "" || confirm_password =="" ) {  
           alert("**Fill the password please!");
             location.replace('./signup.php');
            
      }  
      if(password.length < 4 || password.length > 20 ) {  
            alert("**Password length must be atleast 7 characters and atmost 20 characters" );
              location.replace('./signup.php');
        }
     if (password != confirm_password) {
           alert("passwords didnt match");
           location.replace('./signup.php');
     }
     else{
           alert("registration complete !! You will be redirected to login page");
           return location.replace('./login.php');
     }
    
    }