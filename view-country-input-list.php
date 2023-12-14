<select class="form-select" id="cid" name="cid">
  <?php
    while ($countrynameItem =$countryList->fetch_assoc()){
      $selText = "";
      if ($selectedCountryname == $countrynameItem['country_id']){
        $selText = "selected";

      }
      ?>
      <option value="<?php echo $countrynameItem['country_id'];?>"<?=$selText?>><?php echo $countrynameItem['country_name'];?></option>
  <?php
    }
    ?>
</select>
