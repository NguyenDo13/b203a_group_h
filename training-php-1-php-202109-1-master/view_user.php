<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById($id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
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

        <?php if ($user || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">Username:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Fullname:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="name">Lastname:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['lastname'] ?></span>
            </div>
            <div style="display: flex;" class="form-group">
                <label for="password">Password:</label>&emsp;&emsp;
                <span ><?php if (!empty($user[0]['name'])) echo $user[0]['password'] ?></span>
            </div>
            <div class="form-group">
                <label for="name">Phone:</label>&emsp;&emsp;&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['phone'] ?></span>
            </div>
            <div class="form-group">
                <label for="name">Giới Tính:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['sex'] ?></span>
            </div>
            <div class="form-group">
                <label for="name">Email:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
            </div>
            <div class="form-group">
                <label for="name">Tài khoản:</label>&emsp;&emsp;
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['cost'] ?></span>
            </div>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
        <?php } ?>
    </div>
</body>

</html>