<?php
$ViewModel = new Puzzlout\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof Puzzlout\Framework\ViewModels\WebIdeVm)) {
    throw new Puzzlout\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<fieldset>
    <legend>List of properties</legend>
    <input type="text" placeholder="Type your property" value="" />
    <div class="add-a-property"></div>
</fieldset>

