<?php require "config.php";
$err="";

if($_POST){
$u=clean($_POST['u']);
$p=clean($_POST['p']);

if($u && $p){
$s=$pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
$s->execute([$u,$p]);
if($r=$s->fetch()){
$_SESSION['uid']=$r['id'];
$_SESSION['role']=$r['role'];
header("Location: dashboard.php");
exit;
}
}
$err="Invalid login";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container" style="max-width:420px;">
<h2>EMS Login</h2>

<form method="post">
<div class="form-row">Username<input name="u" required></div>
<div class="form-row">Password<input type="password" name="p" required></div>
<button>Login</button>
<div style="color:red"><?= $err ?></div>
</form>
</div>