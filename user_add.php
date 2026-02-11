<?php 
include "header.php";
require_admin();

$msg="";
$err="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$user = clean($_POST['username'] ?? '');
$pass = clean($_POST['password'] ?? '');
$role = $_POST['role'] ?? '';

if(!$user || !$pass || !$role){
    $err = "All fields required";
}else{

/* check duplicate */
$s = $pdo->prepare("SELECT id FROM users WHERE username=?");
$s->execute([$user]);

if($s->fetch()){
    $err = "Username already exists";
}else{

$stmt = $pdo->prepare("
INSERT INTO users(username,password,role)
VALUES (?,?,?)
");

$stmt->execute([$user,$pass,$role]);

$msg = "User created successfully";
}
}
}
?>

<div class="container">
<h3>Create User (Admin Only)</h3>

<?php if($err): ?><div class="error"><?= $err ?></div><?php endif; ?>
<?php if($msg): ?><div class="success"><?= $msg ?></div><?php endif; ?>

<form method="post">

<div class="form-row">
Username*
<input name="username" required>
</div>

<div class="form-row">
Password*
<input type="password" name="password" required>
</div>

<div class="form-row">
Role*
<br>
<label><input type="radio" name="role" value="admin"> Admin</label>
<label><input type="radio" name="role" value="user" checked> User</label>
</div>

<button>Create User</button>

</form>
</div>

<?php include "footer.php"; ?>
