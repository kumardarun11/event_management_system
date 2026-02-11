<?php 
include "header.php"; 
require_admin();

$msg="";
$err="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$name = clean($_POST['name'] ?? '');
$loc  = clean($_POST['location'] ?? '');
$cap  = intval($_POST['cap'] ?? 0);
$type = $_POST['type'] ?? '';
$date = $_POST['date'] ?? '';

if(!$name || !$loc || !$cap || !$type || !$date){
    $err = "All fields are mandatory";
}else{

$pdo->prepare("
INSERT INTO events(name,type,location,event_date,capacity)
VALUES (?,?,?,?,?)
")->execute([$name,$type,$loc,$date,$cap]);

$msg = "Event added successfully";
}
}
?>

<div class="container">
<h3>Add Event</h3>

<?php if($err): ?>
<div class="error"><?= $err ?></div>
<?php endif; ?>

<?php if($msg): ?>
<div class="success"><?= $msg ?></div>
<?php endif; ?>

<form method="post">

<div class="form-grid">

<!-- NAME -->
<div class="form-group full">
<label>Name*</label>
<input name="name" required>
</div>

<!-- TYPE -->
<div class="form-group">
<label>Type*</label>
<div class="radio-group">
<label><input type="radio" name="type" value="Tech" checked> Tech</label>
<label><input type="radio" name="type" value="Cultural"> Cultural</label>
</div>
</div>

<!-- LOCATION -->
<div class="form-group">
<label>Location*</label>
<input name="location" required>
</div>

<!-- DATE -->
<div class="form-group">
<label>Date*</label>
<input type="date" name="date" required>
</div>

<!-- CAPACITY -->
<div class="form-group">
<label>Capacity*</label>
<input name="cap" type="number" min="1" required>
</div>

</div>

<div class="form-actions">
<button type="submit">Add Event</button>
</div>

</form>
</div>

<?php include "footer.php"; ?>
