<select class="form-select" id="sid" name="sid">
  <?php
    while ($stadiumnameItem =$stadiumList->fetch_assoc()){
      $selText = "";
      if ($selectedStadiumname == $stadiumnameItem['club_id']){
        $selText = "selected";

      }
      ?>
      <option value="<?php echo $stadiumnameItem['stadium_id'];?>"<?=$selText?>><?php echo $stadiumnameItem['stadium_name'];?></option>
  <?php
    }
    ?>
</select>
