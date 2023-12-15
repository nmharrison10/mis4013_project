<select class="form-select" id="gAssister" name="gAssister">
  <?php
    while ($assisternameItem =$assisterList->fetch_assoc()){
      $selText = "";
      if ($selectedAssistername == $assisternameItem['player_id']){
        $selText = "selected";
      }
      ?>
      <option value="<?php echo $assisternameItem['player_id'];?>"<?=$selText?>><?php echo $assisternameItem['player_name'];?>, <?php echo $scorernameItem['club_name'];?></option>
  <?php
    }
    ?>
</select>
