<?php include "header.php"; require_admin();
$r=$pdo->query("SELECT * FROM events");
?>

<div class="container">
<h3>Events</h3>
<a href="event_add.php">Add Event</a>
<table>
<tr><th>Name</th><th>Date</th><th></th></tr>
<?php foreach($r as $e): ?>
<tr>
<td><?= $e['name'] ?></td>
<td><?= $e['event_date'] ?></td>
<td><a href="event_update.php?id=<?= $e['id'] ?>">Edit</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>