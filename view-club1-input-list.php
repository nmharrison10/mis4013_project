<select class="form-select" id="t1id" name="t1id">
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
