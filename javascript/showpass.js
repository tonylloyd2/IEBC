function show_pass(){
    var password = document.getElementById('password');
    if(password.type == 'password'){
        password.type = "text";
    }
    else if(password.type == 'text'){
        password.type = "password";
    }

    var confirm_password = document.getElementById('cpassword');
    if(confirm_password.type == 'password'){
        confirm_password.type = "text";
    }
    else if(confirm_password.type == 'text'){
        confirm_password.type = "password";
    }  

    var new_password = document.getElementById('new_password');
    if(new_password.type == 'password'){
        new_password.type = "text";
    }
    else if(new_password.type == 'text'){
        new_password.type = "password";
    }  
}
function validate_password(){
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('cpassword').value;


    //check empty password field  
  if(password == "" || confirm_password =="" ) {  
      alert("**Fill the password please!");
      location.replace('../password.php');
  }  
  if(password.length < 5 || password.length > 20 ) {  
       alert("**Password length must be atleast 7 characters and atmost 20 characters" );
       location.replace('../password.php');
 }
 if (password != confirm_password) {
     alert("passwords didnt match")
     location.replace('../password.php');
 }
 else{
     alert("registration complete !!")
     alert("you will be redirected to login page")
     return true;
 }

}