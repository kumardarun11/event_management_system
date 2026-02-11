<?php require_once "config.php"; require_login(); ?>
<link rel="stylesheet" href="style.css">

<div class="nav">

<a href="dashboard.php">Dashboard</a>

<?php if($_SESSION['role']=="admin"): ?>
<a href="event_list.php">Maintenance-Events</a>
<a href="membership_list.php">Maintenance-Membership</a>
<a href="participant_add.php">Participants</a>
<a href="user_add.php">User Management</a>
<?php endif; ?>

<a href="register_event.php">Transactions</a>
<a href="reports.php">Reports</a>
<a href="chart.php">Chart</a>
<a href="logout.php">Logout</a>

</div>
