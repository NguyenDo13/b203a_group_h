<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input class="form-control" name="name" placeholder="User Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" name="email" placeholder="VD: nguyenvana@gmail.com" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input class="form-control" name="fullname" placeholder="VD: Nguyen Van A" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input class="form-control" name="lastname" placeholder="VD: A" value="<?php if (!empty($user[0]['lastname'])) echo $user[0]['lastname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Gender</label>
                        <input type="radio" name="gender" value="1" style="margin-left: 20px;" <?php if ($user[0]['sex'] == 1) echo 'checked';?>> Male 
                        <input type="radio" name="gender" value="2" style="margin-left: 120px;" <?php if ($user[0]['sex'] == 2) echo 'checked';?>> Female
                        <input type="radio" name="gender" value="0" style="margin-left: 120px;" <?php if ($user[0]['sex'] > 2 || $user[0]['sex'] < 1) echo 'checked';?>> Other
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Phone Number" value="<?php if (!empty($user[0]['phone'])) echo $user[0]['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Confirm Password" value="<?php #if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
                    </div> -->

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>