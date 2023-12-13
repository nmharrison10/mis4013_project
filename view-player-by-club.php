<h1>Club Roster</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Player ID</th>
      <th>Player Name</th>
      <th>Number</th>
      <th>Age</th>
      <th>Club ID</th>
      <th>Club Name</th>
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
 <?php
  while ($club = $clubs -> fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $club['club_id'];?></td>
      <td><?php echo $club['club_name'];?></td>
    </tr>
    <?php
  }
  ?>
      </tbody>
    </thead>
  </table>
</div>
