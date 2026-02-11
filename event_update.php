<?php include "header.php"; require_admin();

$id = intval($_GET['id']);

$s=$pdo->prepare("SELECT * FROM events WHERE id=?");
$s->execute([$id]);
$e=$s->fetch();

if(!$e) die("Invalid event");

if($_POST){

$name=clean($_POST['name']);
$loc=clean($_POST['location']);
$cap=intval($_POST['cap']);

if(!$name || !$loc || $cap<=0){
$msg="All fields required";
}else{
$pdo->prepare("UPDATE events SET name=?,location=?,capacity=? WHERE id=?")
->execute([$name,$loc,$cap,$id]);
$msg="Updated";
}
}
?>

<div class="container">
<h3>Update Event</h3>

<form method="post">
Name<input name="name" value="<?= $e['name'] ?>" required>
Location<input name="location" value="<?= $e['location'] ?>" required>
Capacity<input name="cap" value="<?= $e['capacity'] ?>" required>
<button>Save</button>
<?= $msg ?? "" ?>
</form>

</div>
<?php include "footer.php"; ?>