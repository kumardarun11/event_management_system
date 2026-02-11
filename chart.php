<?php include "header.php"; ?>

<div class="container">

<h2>Event Management System — Full Workflow</h2>

<div class="card">
This chart shows the complete screen flow and module structure of the EMS application.
</div>

<!-- LOGIN -->
<div class="card">
<h3>🔐 Login Module</h3>
• login.php  
• User enters username & hidden password  
• Session created after validation  
</div>

<div style="text-align:center;font-size:22px;">⬇️</div>

<!-- DASHBOARD -->
<div class="card">
<h3>🏠 Dashboard</h3>
• dashboard.php  
• Shows system summary  
• Shows role (Admin/User)  
• Navigation to all modules  
</div>

<div style="text-align:center;font-size:22px;">⬇️</div>

<!-- MAINTENANCE -->
<div class="card">
<h3>🛠 Maintenance Module (Admin Only)</h3>

<b>Events</b>
<ul>
<li>event_add.php — Add event</li>
<li>event_list.php — View events</li>
<li>event_update.php — Update event</li>
</ul>

<b>Membership</b>
<ul>
<li>membership_add.php — Create membership</li>
<li>membership_update.php — Extend / Cancel membership</li>
<li>membership_list.php — View memberships</li>
</ul>

<b>Participants</b>
<ul>
<li>participant_add.php — Add participant</li>
</ul>

Maintenance data is REQUIRED before Transactions & Reports.
</div>

<div style="text-align:center;font-size:22px;">⬇️</div>

<!-- TRANSACTIONS -->
<div class="card">
<h3>📝 Transactions Module (Admin + User)</h3>

<ul>
<li>register_event.php — Register participant to event</li>
<li>Select Event</li>
<li>Select Active Membership</li>
<li>Checkbox = Confirmed (Yes/No)</li>
<li>Creates registration record</li>
</ul>

</div>

<div style="text-align:center;font-size:22px;">⬇️</div>

<!-- REPORTS -->
<div class="card">
<h3>📊 Reports Module (Admin + User)</h3>

<ul>
<li>reports.php</li>
<li>Shows event registrations</li>
<li>Shows member names</li>
<li>Shows dates</li>
<li>Shows confirmed status</li>
<li>Based on transaction data</li>
</ul>

</div>

<div style="text-align:center;font-size:22px;">⬇️</div>

<!-- LOGOUT -->
<div class="card">
<h3>🚪 Logout</h3>
• logout.php  
• Session destroyed  
• Return to login page  
</div>

</div>

<?php include "footer.php"; ?>