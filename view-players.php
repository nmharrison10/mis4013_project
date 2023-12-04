<div class="row">
  <div class = "col">
  <h1>Players</h1>
  </div>
  <div class = "col-auto">
  </div>
</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
       <th>Player's ID</th>
      <th>Player's Name</th>
      <th>Player's Age</th>
      <th></th> 
      <th></th> 
      </tr>
    </thead>
      <tbody>
  <?php
  while ($player = $players -> fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $player['player_id'];?></td>
      <td><?php echo $player['player_name'];?></td>
      <td><?php echo $player['player_age'];?></td>
      <td>
    <?php
          include "view-players-editform.php";
        ?>
      </td>
    
    </tr>
    <?php
  }
  ?>
      </tbody>
    </thead>
  </table>
</div>
