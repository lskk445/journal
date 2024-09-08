<?php
include_once '../config.php';

include_once ROOT_PATH.'/includes/db.php';
include_once ROOT_PATH . '/includes/header.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: ".BASE_PATH."/pages/login.php");
    exit();
}

?>

<h2>Welcome to your Journal , <?= $_SESSION['username']?></h2>
<p>Here you can write and manage your journal entries</p>

<?php include_once ROOT_PATH . '/includes/footer.php';