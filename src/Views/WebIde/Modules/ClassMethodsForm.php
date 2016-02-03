<?php

use Puzzlout\Framework\Generated\FrameworkViewnames;

$ViewModel = new Puzzlout\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof Puzzlout\Framework\ViewModels\WebIdeVm)) {
    throw new Puzzlout\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<fieldset>
    <legend>List of methods</legend>
    <input type="text" placeholder="Type your method name" />
    <input type="text" placeholder="Type your return type" />
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::METHODPARAMETERS); ?>
    <div class="add-a-property"></div>
</fieldset>

