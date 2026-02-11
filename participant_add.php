<?php 
include "header.php"; 
require_admin();

$msg="";
$err="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$name  = clean($_POST['name'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');

if(!$name || !$email || !$phone){
    $err = "All fields are mandatory";
}else{

$no = "P".date("ymdHis");

/* ✅ use column names — safer */
$stmt = $pdo->prepare("
INSERT INTO participants
(participant_no,name,email,phone,status)
VALUES (?,?,?,?,?)
");

$stmt->execute([
$no,
$name,
$email,
$phone,
'active'
]);

$msg = "Participant Added ($no)";
}
}
?>

<div class="container">
<h3>Add Participant</h3>

<?php if($err): ?>
<div class="error"><?= $err ?></div>
<?php endif; ?>

<?php if($msg): ?>
<div class="success"><?= $msg ?></div>
<?php endif; ?>

<form method="post">

<div class="form-row">
Name*  
<input name="name" required>
</div>

<div class="form-row">
Email*  
<input name="email" required>
</div>

<div class="form-row">
Phone*  
<input name="phone" required>
</div>

<button type="submit">Add Participant</button>

</form>
</div>

<?php include "footer.php"; ?>
