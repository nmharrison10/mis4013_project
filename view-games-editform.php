<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editGameModal<?php echo $game['game_id'];?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editGameModal<?php echo $game['game_id'];?>" tabindex="-1" aria-labelledby="editGameModal<?php echo $game['game_id'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editGameModal<?php echo $game['game_id'];?>">Edit Game</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="post" action="">
          <div class="mb-3">
            <label for="t1id<?php echo $game['game_id'];?>" class="form-label">Team 1</label>
<?php
    $clubList = selectClubsForInput();
    $selectedClubname = $game['team1_id'];?>;
    include "view-club1-input-list.php";
?> </div>
        <div class="mb-3">
            <label for="t1s<?php echo $game['game_id'];?>" class="form-label">Team 1 Score</label>
            <input type="text" class="form-control" id="t1s<?php echo $game['game_id'];?>" name="t1s" value="<?php echo $game['team1_score'];?>">
          </div>
               <div class="mb-3">
            <label for="t2id<?php echo $game['game_id'];?>" class="form-label">Team 2</label>
<?php
    $clubList = selectClubsForInput();
    $selectedClubname = $game['team2_id'];?>;
    include "view-club2-input-list.php";
?> </div>
               <div class="mb-3">
            <label for="t2s<?php echo $game['game_id'];?>" class="form-label">Team 2 Score</label>
            <input type="text" class="form-control" id="t2s<?php echo $game['game_id'];?>" name="t2s" value="<?php echo $game['team2_score'];?>">
          </div>
               <div class="mb-3">
            <label for="sid<?php echo $game['game_id'];?>" class="form-label">Stadium ID</label>
            <input type="text" class="form-control" id="sid<?php echo $game['game_id'];?>" name="sid" value="<?php echo $game['stadium_id'];?>">
          </div>
               <div class="mb-3">
            <label for="date<?php echo $game['game_id'];?>" class="form-label">Date</label>
            <input type="date" class="form-control" id="date<?php echo $game['game_id'];?>" name="date" value="<?php echo $game['date'];?>">
          </div>
              <input type="hidden" name="gid" value="<?php echo $game['game_id'];?>">
          <input type="hidden" name="actionType" value="Edit">
          <button type="submit" class="btn btn-primary">Save</button>
            </form>
        
      </div>
    </div>
  </div>
</div>
