<?php
if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}
use WebDevJL\Framework\Generated\FrameworkViewnames;
$ViewModel = new WebDevJL\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof WebDevJL\Framework\ViewModels\WebIdeVm)) {
  throw new WebDevJL\Framework\Exceptions\InvalidViewModelTypeException();
} else {
  $ViewModel = clone $ControllerVm;
}
?>
<fieldset>
  <legend>List of methods</legend>
  <input type="text" placeholder="Type your method name" />
  <input type="text" placeholder="Type your return type" />
  <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::METHODPARAMETERS); ?>
  <div class="add-a-property"></div>
</fieldset>

