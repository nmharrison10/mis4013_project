<select class="form-select" id="cid" name="cid">
  <?php
    while ($clubnameItem =$clubList->fetch_assoc()){
      $selText = "";
      if ($selectedClubname == $clubnameItem['club_id']){
        $selText = "selected";

      }
      ?>
      <option value="<?php echo $clubnameItem['club_id'];?>"<?=$selText?>><?php echo $clubnameItem['club_name'];?></option>
  <?php
    }
    ?>
</select>
