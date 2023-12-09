<select class="form-select" id="cName" name="cName">
  <?php
    while ($countrynameItem =$countryList->fetch_assoc()){
      $selText = "";
      if ($selectedCountryname == $countryItem['country_name']){
        $selText = "selected";

      }
      ?>
      <option value="<?php echo $countrynameItem['country_name'];?>"<?=$selText?>><?php echo $countrynameItem['country_name'];?></option>
  <?php
    }
    ?>
</select>
