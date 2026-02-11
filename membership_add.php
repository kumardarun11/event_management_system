<?php 
include "header.php"; 
require_admin();

$msg="";
$err="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$name = clean($_POST['name'] ?? '');
$dur  = $_POST['dur'] ?? '';

/* ✅ VALIDATIONS — ALL FIELDS MANDATORY */
if(!$name || !$dur){
    $err = "All fields are mandatory";
}else{

    /* ✅ Generate membership number */
    $no = "M".date("ymdHis");

    $start = new DateTime();
    $exp   = clone $start;

    /* ✅ Duration rule — radio only one selected */
    if($dur=="1y"){
        $exp->modify("+1 year");
    }
    elseif($dur=="2y"){
        $exp->modify("+2 years");
    }
    else{
        $exp->modify("+6 months"); // default
    }

    /* ✅ Safe insert with column names */
    $stmt = $pdo->prepare("
        INSERT INTO memberships
        (membership_no,name,start_date,expiry_date,status)
        VALUES (?,?,?,?,?)
    ");

    $stmt->execute([
        $no,
        $name,
        $start->format('Y-m-d'),
        $exp->format('Y-m-d'),
        'active'
    ]);

    $msg = "Membership Created Successfully — Number: $no";
}
}
?>

<div class="container">
<h3>Add Membership</h3>

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
Duration* (Select One)
<br>

<label>
<input type="radio" name="dur" value="6m" checked>
6 Months
</label>

<label>
<input type="radio" name="dur" value="1y">
1 Year
</label>

<label>
<input type="radio" name="dur" value="2y">
2 Years
</label>

</div>

<button type="submit">Create Membership</button>

</form>
</div>

<?php include "footer.php"; ?>
