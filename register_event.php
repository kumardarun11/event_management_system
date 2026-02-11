<?php 
include "header.php";

/* ✅ Maintenance dependency — events must exist */
$eventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
if($eventCount == 0){
    die("Maintenance module must be completed first (Add Events).");
}

/* ✅ Load dropdown data */
$events = $pdo->query("SELECT id,name FROM events ORDER BY name")->fetchAll();
$mem    = $pdo->query("SELECT id,name FROM memberships WHERE status='active' ORDER BY name")->fetchAll();

$msg = "";
$err = "";

/* ✅ FORM SUBMIT */
if($_SERVER['REQUEST_METHOD']=="POST"){

$event_id = intval($_POST['event'] ?? 0);
$mem_id   = intval($_POST['mem'] ?? 0);
$remarks  = clean($_POST['remarks'] ?? '');

$confirmed = isset($_POST['agree']) ? 1 : 0;   // ✅ checkbox rule

/* ✅ VALIDATIONS */
if(!$event_id || !$mem_id){
    $err = "Event and Membership selection are mandatory";
}else{

    /* ✅ Safe insert with column names */
    $stmt = $pdo->prepare("
        INSERT INTO registrations
        (event_id, membership_id, reg_date, remarks, confirmed)
        VALUES (?,?,CURDATE(),?,?)
    ");

    $stmt->execute([
        $event_id,
        $mem_id,
        $remarks,
        $confirmed
    ]);

    $msg = "Participant Registered Successfully";
}
}
?>

<div class="container">
<h3>Register Participant (Transactions)</h3>

<?php if($err): ?>
<div class="error"><?= $err ?></div>
<?php endif; ?>

<?php if($msg): ?>
<div class="success"><?= $msg ?></div>
<?php endif; ?>

<form method="post">

<div class="form-row">
Event*  
<select name="event" required>
<option value="">Select Event</option>
<?php foreach($events as $e): ?>
<option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
<?php endforeach; ?>
</select>
</div>


<div class="form-row">
Membership*  
<select name="mem" required>
<option value="">Select Membership</option>
<?php foreach($mem as $m): ?>
<option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
<?php endforeach; ?>
</select>
</div>


<div class="form-row">
Remarks  
<textarea name="remarks"></textarea>
</div>


<div class="form-row">
<label>
<input type="checkbox" name="agree" value="1">
Confirmed (Checked = Yes, Unchecked = No)
</label>
</div>

<button type="submit">Register</button>

</form>
</div>

<?php include "footer.php"; ?>
