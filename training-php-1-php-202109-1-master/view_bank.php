<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
$userModel = new UserModel();
$bankModel = new BankModel();

$user = NULL; //Add new user
$user_id = NULL;

if (!empty($_GET['id'])) {
    $user_id = $_GET['id'];
    $user = $bankModel->findUserById($user_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($user_id)) {
        $bankModel->updateBank($_POST);
    } else {
        // $bankModel->insertBank($_POST);
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
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($user || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User Bank
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $user_id ?>">
            <div class="form-group">
                <label for="name">Cost</label>
                <input class="form-control" name="cost" placeholder="0000" value="<?php if (!empty($user[0]['cost'])) echo $user[0]['cost'] ?>">
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
            <!-- <input type="text" name="id" value="<?php #echo $id ?>">
            <div class="form-group">
                <label for="password">Cost</label>
                <span><?php #if (!empty($user[0]['cost'])) echo $user[0]['cost'] ?></span>
            </div> -->
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
</html>