/**
New Javascript validation
*/
     //Decalring variables
     var email = document.forms["myForm"]["email"];
     var password = document.forms["myForm"]["password"];
     var confirm_password = document.forms["myForm"]["confirm_password"];
     var dob = document.forms["myForm"]["dob"];
     var atpos = email.indexOf("@");
     var dotpos = email.lastIndexOf(".");
      
      function validate()
      {
      var name = document.forms["myForm"]["name"];
      	//Checking if the name is empty
         if( name.value == "" )
         {
            document.getElementById('name_error').innerHTML = "First name needed";
            name.style.border="2px solid red";
            name.focus() ;
            return false;
         }
        
         //Checking if the email is empty
         if(email.value == "" )
         {
            document.getElementById('email_error').innerHTML = "Email needed";
            email.style.border="2px solid red";
            return false;
         }
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            document.getElementById('email_error').innerHTML = "Wrong email format";
            email.style.border="2px solid red";
            email.focus() ;
            return false;
         }
         //Checking the password is empty
         if( password.value == "")
         {
           document.getElementById('password_error').innerHTML = "Password needed";
           password.style.border="2px solid red";
            password.focus() ;
            return false;
         }
         //Checking if the confirm_password is empty
         if(confirm_password.value =="")
         {
           document.getElementById('password_error').innerHTML = "Confirm password";
           confirm_password.style.border="2px solid red";
            confirm_password.focus() ;
            return false;
         }
         //Checking if the passwords match
         if( password.value != confirm_password.value)
         {
            document.getElementById('password_error').innerHTML = "Passwords don't match";
            password.style.border="2px solid red";
            confirm_password.focus() ;
            return false;
         }
         
         if( dob.value =="")
         {
            document.getElementById('dob_error').innerHTML = "Date of Birth need";
            dob.style.border="2px solid red";
            dob.focus();
            return false;
         }
         
         return true;
         
      }