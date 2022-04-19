<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

if (isset($_POST['submit'])) {
    # code...
    $username = $_POST['username'];
    $password = $_POST['password'];    
    $email=$_POST['username'];
    if (!$username|| !$email ||!$password) {
        # code...
        echo "Vui lòng nhập user và password . <a href= 'javascript: history.go(-1)'> Trở về</a>";
        exit;          
    }
    if ($userModel->auth($username, $password)) {       
           
        header('location: list_users.php');       
    } else  if ($userModel->loginemail($email, $password)) {       
           
        header('location: list_users.php');       
    }  
    else {      
        header('location:login.php');       
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Login</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot
                            password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">
                    <form method="post" class="form-horizontal" role="form">

                        <div class="margin-bottom-25 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value=""
                                placeholder="username or email">
                        </div>

                        <div class="margin-bottom-25 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password"
                                placeholder="password">
                        </div>

                        <div class="margin-bottom-25">
                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                            <label for="remember"> Remember Me</label>
                        </div>

                        <div class="margin-bottom-25 input-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button type="submit" name="submit" value="submit"
                                    class="btn btn-primary">Submit</button>
                                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                Don't have an account!
                                <a href="signup.php">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>