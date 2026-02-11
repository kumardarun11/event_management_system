<?php include "header.php"; require_admin();
$r=$pdo->query("SELECT * FROM memberships");
?>

<div class="container">
<h3>Memberships</h3>
<a href="membership_add.php">Add Membership</a>

<table>
<tr><th>No</th><th>Name</th><th>Status</th><th></th></tr>

<?php foreach($r as $m): ?>
<tr>
<td><?= $m['membership_no'] ?></td>
<td><?= $m['name'] ?></td>
<td><?= $m['status'] ?></td>
<td>
<a href="membership_update.php">Update</a>
</td>
</tr>
<?php endforeach; ?>

</table>
</div>

<?php include "footer.php"; ?>
