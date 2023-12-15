<select class="form-select" id="gScorer" name="gScorer">
  <?php
    while ($scorernameItem =$scorerList->fetch_assoc()){
      $selText = "";
      if ($selectedScorername == $scorernameItem['player_id']){
        $selText = "selected";
      }
      ?>
      <option value="<?php echo $scorernameItem['player_id'];?>"<?=$selText?>><?php echo $scorernameItem['player_name'];?>", "<?php echo $scorernameItem['club_name'];?></option>
  <?php
    }
    ?>
</select>
