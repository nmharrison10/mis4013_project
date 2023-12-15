<h1>Club Roster</h1>
<div class="table-responsive">
  <table class="table">
    <head>
      <tr>
      <th>Club Name</th>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Player Number</th>
      <th>Player Age</th>
      </tr>
    </head>
    <body>
<?php
    while ($player = $players->fetch_assoc()) {
?>
<tr>
      <td><?php echo $player['club_name']?></td>
      <td><?php echo $player['player_id']?></td>
      <td><?php echo $player['player_name']?></td>
      <td><?php echo $player['player_number']?></td>
      <td><?php echo $player['player_age']?></td>
</tr>
<?php
}
?>
    </body>
  </table>
</div>
<?php
?>
