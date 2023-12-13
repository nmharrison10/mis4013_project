<h1>Club Roster</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Number</th>
      <th>Age</th>
      </tr>
      <tbody>
  <?php
  while ($player = $players -> fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $player['player_id'];?></td>
      <td><?php echo $player['player_name'];?></td>
      <td><?php echo $player['player_number'];?></td>
      <td><?php echo $player['player_age'];?></td>
    </tr>
    <?php
  }
  ?>
      </tbody>
    </thead>
  </table>
</div>
