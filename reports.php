<?php 
include "header.php";

/* ✅ Maintenance dependency */
$eventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
if($eventCount == 0){
    die("Maintenance module must be completed first.");
}

/* ✅ Transaction dependency */
$regCount = $pdo->query("SELECT COUNT(*) FROM registrations")->fetchColumn();
?>

<div class="container">
<h3>Reports</h3>

<?php if($regCount == 0): ?>

<div class="card">
No transaction records found yet.
</div>

<?php else: ?>

<?php
/* ✅ Proper joined report */
$r = $pdo->query("
SELECT 
 e.name AS event_name,
 m.name AS member_name,
 r.reg_date,
 r.confirmed
FROM registrations r
JOIN events e ON e.id = r.event_id
JOIN memberships m ON m.id = r.membership_id
ORDER BY r.reg_date DESC
");
?>

<table>
<tr>
<th>Event</th>
<th>Member</th>
<th>Date</th>
<th>Confirmed</th>
</tr>

<?php foreach($r as $row): ?>
<tr>
<td><?= $row['event_name'] ?></td>
<td><?= $row['member_name'] ?></td>
<td><?= $row['reg_date'] ?></td>
<td><?= $row['confirmed'] ? "Yes" : "No" ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>

</div>

<?php include "footer.php"; ?>