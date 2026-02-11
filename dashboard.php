<?php include "header.php"; ?>

<?php
$eventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$memberCount = $pdo->query("SELECT COUNT(*) FROM memberships")->fetchColumn();
$activeMembers = $pdo->query("SELECT COUNT(*) FROM memberships WHERE status='active'")->fetchColumn();
$regCount = $pdo->query("SELECT COUNT(*) FROM registrations")->fetchColumn();

/* latest records */
$latestEvents = $pdo->query("SELECT * FROM events ORDER BY id DESC LIMIT 5")->fetchAll();
$latestMembers = $pdo->query("SELECT * FROM memberships ORDER BY id DESC LIMIT 5")->fetchAll();
$latestRegs = $pdo->query("
SELECT e.name event, m.name member, r.reg_date
FROM registrations r
JOIN events e ON e.id=r.event_id
JOIN memberships m ON m.id=r.membership_id
ORDER BY r.id DESC LIMIT 5
")->fetchAll();
?>

<div class="container">

<h2>Dashboard</h2>

<div class="card">
<b>Logged in as:</b> <?= $_SESSION['role'] ?>
</div>

<div class="card">
<b>System Flow:</b><br>
Login → Dashboard → Maintenance → Transactions → Reports
</div>

<!-- =======================
   SUMMARY CARDS
======================= -->

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:15px;">

<div class="card"><b>Total Events</b><br><?= $eventCount ?></div>
<div class="card"><b>Total Memberships</b><br><?= $memberCount ?></div>
<div class="card"><b>Active Memberships</b><br><?= $activeMembers ?></div>
<div class="card"><b>Total Registrations</b><br><?= $regCount ?></div>

</div>

<br>

<!-- =======================
   ADMIN QUICK TABLES
======================= -->

<?php if($_SESSION['role']=="admin"): ?>

<h3>Recent Events</h3>
<table>
<tr>
<th>Name</th>
<th>Date</th>
<th>Location</th>
<th>Edit</th>
</tr>

<?php foreach($latestEvents as $e): ?>
<tr>
<td><?= $e['name'] ?></td>
<td><?= $e['event_date'] ?></td>
<td><?= $e['location'] ?></td>
<td>
<a href="event_update.php?id=<?= $e['id'] ?>">Edit</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<br>

<h3>Recent Memberships</h3>
<table>
<tr>
<th>No</th>
<th>Name</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php foreach($latestMembers as $m): ?>
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

<br>

<?php endif; ?>


<!-- =======================
   RECENT TRANSACTIONS
======================= -->

<h3>Recent Registrations</h3>
<table>
<tr>
<th>Event</th>
<th>Member</th>
<th>Date</th>
</tr>

<?php foreach($latestRegs as $r): ?>
<tr>
<td><?= $r['event'] ?></td>
<td><?= $r['member'] ?></td>
<td><?= $r['reg_date'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<br>

<!-- =======================
   NAVIGATION BLOCKS
======================= -->

<div class="card">
<h3>Transactions</h3>
<a href="register_event.php">Register Participant</a>
</div>

<div class="card">
<h3>Reports</h3>
<a href="reports.php">View Reports</a>
</div>

<!-- =======================
   STATUS WARNINGS
======================= -->

<?php if($eventCount == 0): ?>
<div class="error">
No events found — Complete Maintenance first.
</div>
<?php endif; ?>

<?php if($eventCount > 0 && $regCount == 0): ?>
<div class="card">
Events exist but no registrations yet.
</div>
<?php endif; ?>

</div>

<?php include "footer.php"; ?>
