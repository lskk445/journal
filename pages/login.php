<?php
include_once '../config.php';

include_once ROOT_PATH.'/includes/db.php';
include_once ROOT_PATH . '/includes/header.php';

if($_SERVER['REQUEST_METHOD']=='POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $rs = mysqli_query($con, "Select * from users where username = '".$username."'");
    $user = mysqli_fetch_assoc($rs);
    if($user){
        if(password_verify($password,$user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username']=$user['username'];
            header("Location: ".BASE_PATH."/pages/home.php");
            exit();
        } else {
            $error = "Invalid Password";
        }
    } else {
        $error = "No user found with that username";
    }
}


?>

<h2>Login</h2>

<form action="" method="post">
    <?php if(isset($error)) { ?>
    <div class="alert alert-danger"><?=$error?></div>
    <?php } ?>
    <div class="form-group">
        <label for="username">UserName:</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>

</form>

<?php include ROOT_PATH . '/includes/footer.php'; ?>