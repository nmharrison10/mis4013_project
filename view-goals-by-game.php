<h1>Goals By Game</h1>
<div class="table-responsive">
  <table class="table">
    <head>
      <tr>
      <th>Game ID</th>
      <th>Goal ID</th>
      <th>Scorer</th>
      <th>Assister</th>
      </tr>
    </head>
    <body>
<?php
    while ($goal = $goals->fetch_assoc()) {
?>
<tr>
      <td><?php echo $goal['game_id']?></td>
      <td><?php echo $goal['goal_id']?></td>
      <td><?php echo $goal['scorer']?></td>
      <td><?php echo $goal['assister']?></td>
</tr>
<?php
}
?>
    </body>
  </table>
</div>
<?php
?>
