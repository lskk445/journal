<?php
include_once '../config.php';

include_once ROOT_PATH.'/includes/db.php';
include_once ROOT_PATH . '/includes/header.php';

if($_SERVER['REQUEST_METHOD']=='POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if($password != $confirmPassword) {
        $error = "Password and Confirm Password must be same";
    } else {
        $rs = mysqli_query($con, "Insert into users set username='".$username."',password='".password_hash($password,PASSWORD_BCRYPT)."'");
        if($rs) {
            $success = "Registration success you can now <a href='".BASE_PATH."/pages/login.php'>login</a>";
        } else {
            $error = "Registration failed, Please try again";
        }
    }
}
?>

<h2>Register</h2>
<?php if(isset($success)) { ?>  
    <div class="alert alert-success"><?=$success?></div>
<?php } ?>
<?php if(isset($error)) { ?>  
    <div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<form action="" method="post">
    <div class="form-group">
    <label for="username">UserName</label>
    <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="confirmPassword">ConfirmPassword</label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php include ROOT_PATH . '/includes/footer.php'; ?>
