<?php

use WebDevJL\Framework\Generated\FrameworkViewnames;

$ViewModel = new WebDevJL\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof WebDevJL\Framework\ViewModels\WebIdeVm)) {
    throw new WebDevJL\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<?php echo WebDevJL\Framework\UC\StylesheetControl::Init()->ForInternalResource("Web/library/css/webide.css"); ?>
<?php echo WebDevJL\Framework\UC\LinkControl::Init()->Simple("../Generator/Index", "Go to Code generator"); ?>
<h1>Create a file</h1>
<form class="fileCreationForm" action="../WebIdeAjax/ProcessFileCreation" method="post">
    <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILETYPEINPUT); ?>
    <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILENAMEINPUT); ?>
    <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILEDESCRIPTIONINPUT); ?>
    <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILEDESTINATIONPATHINPUT); ?>
    <?php include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILECONTENTS); ?>
    <input id="createFile" class="btn btn-info" type="submit" value="Create File" />
</form>
<?php echo WebDevJL\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/webide.createfile.js"); ?>