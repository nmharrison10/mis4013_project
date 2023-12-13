<h1>Clubs by Country</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>Club ID</th>
      <th>Club Name</th>
      <th>Coach</th>
      <th>Location</th>
      </tr>
      <tbody>
  <?php
  while ($club = $clubs -> fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $club['club_id'];?></td>
      <td><?php echo $club['club_name'];?></td>
      <td><?php echo $club['coach'];?></td>
      <td><?php echo $club['location'];?></td>
    </tr>
    <?php
  }
  ?>
      </tbody>
    </thead>
  </table>
</div>
