<?php
    ob_start();
    session_start();
    
    require 'inc/top.php';
    require_once 'inc/db.php';

        if (isset($_POST['submit'])) {

            $username = mysqli_real_escape_string($con, $_POST['username']) ;
            $password = mysqli_real_escape_string($con, $_POST['password']) ;
    
            $query = "SELECT * FROM user WHERE 	user_name = '{$username}' && user_password = '{$password}' ";
            $result = mysqli_query($con, $query);
    
            $check = mysqli_fetch_assoc($result);
            
                if ($check > 1) {
                    $_SESSION['user_name'] = $username;
                    echo "<script>window.open('index_admin.php', '_self')</script>";
                    
                }else {
                    
                    echo "<script>alert('Email or Password is not correct')</script>";
                }
        } 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <title>Student Login Page</title>
  </head>
  <body>
   
  <div class="conatiner-fluid">
        <div class="row mt-5">            
            <div class="col-md-3"></div>
            <div class="col-md-6" style="background: lightblue; height:350px;">
            
                <form action="login_admin.php" class="mt-4" method="POST">
                    <H2 class="text-danger">Please Sign In (Admin Area)</H2><hr>
                    <label for="" class="text-danger">Username</label>
                    <input style="height: 35px;" type="text" name="username" class="form-control" placeholder="Username" required id=""><br>

                    <label for="" class="text-danger">Password</label>
                    <input style="height: 35px;" type="password" name="password" class="form-control" placeholder="Password" required id=""><br>
                
                    <button type="submit" name="submit" class=" mt-2 btn btn-danger btn-block">Submit</button>
                    <input type="hidden" name="submitted" value="true">
                </form>
            </div>
        </div>
    </div>

    
  </body>
</html>




