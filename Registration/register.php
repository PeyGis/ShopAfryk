<!DOCTYPE html>
<html lang="en">
      <head>  
           <title>ShopAfryk|Registration</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           
      </head>  
      <body>  
           
           <div class="container" style="width:500px;">  
                <form action="insertNewUser.php" method="post" name="myForm" onsubmit="return validate();" > 
                  <br />
                  <label>Name</label>  
                  <input type="text" name="name" id="name" placeholder="Full name" class="form-control" />  
                  <span id="name_error" class="text-danger"></span>  
                  <br />   
                  <label>Email address</label>
                  <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  <br/>
                  <span id="email_error" class="text-danger"></span>  
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <br/>
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                  <span id="password_error" class="text-danger"></span>  
                  <br/>
                  <label>Select Gender</label>
                  <select name="gender" id="gender" class="form-control">
                  <option value="Male">Male</option>  
                  <option value="Female">Female</option>
                  </select>
                  <br />  
                  <label>Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="form-control" />
                  <span id="dob_error" class="text-danger"></span>  
                  <br />
                  <input type="submit" value="Register" class="btn btn-success"/>  
                  <span id="success_message" class="text-success"></span>  
                </form>  
           </div>  
      </body> 
        <script src="script.js"></script>
 </html>  
  