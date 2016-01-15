<?php
$ViewModel = new WebDevJL\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof WebDevJL\Framework\ViewModels\WebIdeVm)) {
    throw new WebDevJL\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<fieldset>
    <legend>List of method parameters</legend>
    <input type="text" placeholder="Type your parameter: type followed by name seperated by a comma" value="" />
    <div class="add-a-param"></div>
</fieldset>

