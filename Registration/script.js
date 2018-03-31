/**
New Javascript validation
*/
     //Decalring variables

      function validate()
      {

     var name = document.forms["myForm"]["name"];
     var email = document.forms["myForm"]["email"];
     var password = document.forms["myForm"]["password"];
     var confirm_password = document.forms["myForm"]["confirm_password"];
     var dob = document.forms["myForm"]["dob"];
     var atpos = emailID.indexOf("@");
     var dotpos = emailID.lastIndexOf(".");

      	//Checking if the name is empty
         if( name.value == "" )
         {
            alert( "Please provide your name!" );
            name.focus() ;
            return false;
         }
         //Checking if the email is empty
         if(email.value == "" )
         {
            alert( "Please provide your Email!" );
            email.focus() ;
            return false;
         }
         //Checking the password is empty
         if( password.value == "" || confirm_password.value =="")
         {
           alert( "The passwords must be provided" );
            password.focus() ;
            return false;
         }
         
         if( dob.value =="")
         {
            alert( "The date of birth is required" );
            dob.focus();
            return false;
         }
         //Checking if the password match
         if( password.value != confirm_password.value)
         {
            alert( "Passwords don't much man" );
            confirm_password.focus() ;
            return false;
         }
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct email ID")
            email.focus() ;
            return false;
         }
         return true;
         
      }