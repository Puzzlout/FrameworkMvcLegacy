<div class="form-group">
  <label for="fileType">Select the file type</label>
  <select id="fileType" name="fileType" class="form-control">
    <?php
    foreach (WebDevJL\Framework\GeneratorEngine\Constants\FileTypes::Init()->RetrieveList() as $key => $displayedText) {
      echo '<option data-id="' . $key . '">' . $displayedText . '</option>';
    }
    ?>
  </select>
</div>