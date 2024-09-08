<?php
include_once '../config.php';

include_once ROOT_PATH.'/includes/db.php';
include_once ROOT_PATH . '/includes/header.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: ".BASE_PATH."/pages/login.php");
    exit();
}
if($_SERVER['REQUEST_METHOD']=='POST') {
    $entry = $_POST['entry'];

    $rs = mysqli_query($con,"update journal_entries set entry='".$entry."' where id = ".$_POST['id']);
    if($rs) {
        header("Location: ".BASE_PATH."/pages/journal.php");
        exit();
    }else{
        $error = "Updation failed";
    }
}
$rs = mysqli_query($con,"select * from journal_entries where id = ".$_GET['id']);
$row = mysqli_fetch_assoc($rs);
?>
<h2>Edit your  Journal Entry</h2>
<?php if(isset($success)) { ?>
    <div class="alert alert-success"><?=$success?></div>
    <?php unset($success); ?>
<?php } ?>

<?php if(isset($error)) { ?>
    <div class="alert alert-danger"><?=$error?></div>
    <?php unset($error); ?>

<?php } ?>

<form action="" method="post">
    <div class="form-group">
        <label for="entry">Entry</label>
        <textarea name="entry" id="entry" rows="5" cols="100"  required ><?= htmlspecialchars($row['entry']) ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?=$_GET['id']?>" />
    <button type="submit" class="btn btn-primary">Update</button>
</form>