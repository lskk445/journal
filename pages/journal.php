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
    $user_id = $_SESSION['user_id'];


    $rs = mysqli_query($con, "insert into journal_entries set user_id = ".$user_id.", entry='".$entry."'");
    if($rs) {
        $success = "Journal entry Saved";
    } else {
        $error = "Journal entry failed to save";
    }
}

?>

<h2>Write a Journal Entry</h2>
<?php if(isset($success)) { ?>
    <div class="alert alert-success"><?=$success?></div>
    <?php unset($success); ?>
<?php } ?>

<?php if(isset($error)) { ?>
    <div class="alert alert-danger"><?=$error?></div>
    <?php unset($error); ?>

<?php } ?>

<form action="" method="post">
    <div class="form-group" style="display: flex; flex-direction: column;">
        <label for="entry">Entry</label>
        <textarea name="entry" id="entry" style="flex-grow: 1; min-height: 150px; resize: vertical;" required ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<h2>Your Journal Entries</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Entry</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $rs = mysqli_query($con, "select id,entry,created_at from journal_entries where user_id = ".$_SESSION['user_id']." order by created_at desc ");
    while($row = mysqli_fetch_assoc($rs)) { 
        
        $utctime = $row['created_at'];
        $date = new DateTime($utctime, new DateTimeZone('utc'));
        $date->setTimeZone(new DateTimeZone('Asia/Kolkata'));
        $formattedDate = $date->format('Y, M,d h:i a');
        
        
        ?>  
    <tr>
        <td><?= date("Y,M,d h:i a",strtotime($row['created_at']))?> </td>
        <td><?=$row['entry']?></td>
        <td>
        <a href="<?= BASE_PATH ?>/pages/edit.php?id=<?= $row['id']  ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= BASE_PATH ?>/pages/delete.php?id=<?= $row['id']  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete the entry?')">Delete</a>

    </td>
    </tr>
    <?php } ?>
    </tbody>

</table>
<?php include_once ROOT_PATH . '/includes/footer.php'; ?>