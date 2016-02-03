<?php

use Puzzlout\Framework\Generated\FrameworkViewnames;

$ViewModel = new Puzzlout\Framework\ViewModels\WebIdeVm($this->app);
if (!($ControllerVm instanceof Puzzlout\Framework\ViewModels\WebIdeVm)) {
    throw new Puzzlout\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<?php echo Puzzlout\Framework\UC\StylesheetControl::Init()->ForInternalResource("Web/library/css/webide.css"); ?>
<?php echo Puzzlout\Framework\UC\LinkControl::Init()->Simple("../Generator/Index", "Go to Code generator"); ?>
<h1>Create a file</h1>
<form class="fileCreationForm" action="../WebIdeAjax/ProcessFileCreation" method="post">
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILETYPEINPUT); ?>
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILENAMEINPUT); ?>
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILEDESCRIPTIONINPUT); ?>
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILEDESTINATIONPATHINPUT); ?>
    <?php include_once Puzzlout\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(FrameworkViewnames::FILECONTENTS); ?>
    <input id="createFile" class="btn btn-info" type="submit" value="Create File" />
</form>
<?php echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/webide.createfile.js"); ?>