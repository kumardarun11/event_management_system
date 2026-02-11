<?php include "header.php"; require_admin();

if(isset($_POST['search'])){
$s=$pdo->prepare("SELECT * FROM memberships WHERE membership_no=?");
$s->execute([$_POST['membership_no']]);
$m=$s->fetch();
}

if(isset($_POST['update'])){
$id=$_POST['id'];

if($_POST['action']=="extend"){
$pdo->prepare("UPDATE memberships
SET expiry_date=DATE_ADD(expiry_date,INTERVAL 6 MONTH)
WHERE id=?")->execute([$id]);
$msg="Extended";
}

if($_POST['action']=="cancel"){
$pdo->prepare("UPDATE memberships SET status='cancelled' WHERE id=?")
->execute([$id]);
$msg="Cancelled";
}
}
?>

<div class="container">
<h3>Update Membership</h3>

<form method="post">
Membership Number*
<input name="number" required>
<button name="search">Search</button>
</form>

<?php if(!empty($m)): ?>
<form method="post">
<input type="hidden" name="id" value="<?= $m['id'] ?>">

<label><input type="radio" name="action" value="extend" checked>Extend 6 months</label>
<label><input type="radio" name="action" value="cancel">Cancel</label>

<button name="update">Update</button>
</form>
<?php endif; ?>
</div>
