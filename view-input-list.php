<select class="form-select" id="cName" name="cName">
  <?php
    while ($countryItem =$countryList->fetch_assoc()){
      $selText = "";
      if ($selectedCountry == $countryItem['country_name']){
        $selText = "selected";

      }
      ?>
      <option value="<?php echo $countryItem['country_name'];?>"<?=$selText?>><?php echo $countryItem['country_name'];?></option>
  <?php
    }
    ?>
</select>
