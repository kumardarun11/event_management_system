<?php include "header.php";

$events=$pdo->query("SELECT * FROM events")->fetchAll();
$parts=$pdo->query("SELECT * FROM participants WHERE status='active'")->fetchAll();

if($_POST){
 $pdo->prepare("INSERT INTO registrations
 VALUES(NULL,?,?,CURDATE(),?,?,?)")
 ->execute([
   $_POST['event'],
   $_POST['part'],
   $_POST['amount'],
   isset($_POST['paid'])?1:0,
   $_POST['remarks']
 ]);
 echo "<div class=success>Registered</div>";
}
?>

<div class="container">
<h3>Register Participant</h3>

<form method="post">
Event*
<select name="event" required>
<?php foreach($events as $e) echo "<option value=$e[id]>$e[name]</option>"; ?>
</select>

Participant*
<select name="part" required>
<?php foreach($parts as $p) echo "<option value=$p[id]>$p[name]</option>"; ?>
</select>

Fee <input name="amount" value="0">
<label><input type="checkbox" name="paid"> Payment Paid</label>

Remarks <textarea name="remarks"></textarea>

<button>Register</button>
</form>
</div>
