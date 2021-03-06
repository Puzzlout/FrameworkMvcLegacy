<!DOCTYPE html>
<html lang="<?php echo $this->app->locale; ?>">
    <head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="apple-touch-fullscreen" content="yes">
        <title><?php echo $ControllerVm->ResxFor("PageTitle"); ?></title>
        <?php
        echo Puzzlout\Framework\UC\StylesheetControl::Init()->ForInternalResource("Applications/" . "APP_NAME" . "/ClientSide/css/app/reset.css");
        echo Puzzlout\Framework\UC\StylesheetControl::Init()->ForInternalResource("Web/library/css/core/bootstrap.css");
        echo Puzzlout\Framework\UC\StylesheetControl::Init()->ForInternalResource("Applications/" . "APP_NAME" . "/ClientSide/css/addons/toastr.css");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/core/jquery.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/core/jquery-ui.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/config.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/dataservice.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/utils.js");
        ?>
    </head>
    <body id="home">
        <?php echo $content; ?>
        <?php
        //echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/core/parsexml.js");
        //echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/core/bootbox.min.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Applications/" . "APP_NAME" . "/ClientSide/js/addons/toastr.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/config.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/dataservice.js");
        echo Puzzlout\Framework\UC\ScriptControl::Init()->ForInternalResource("Web/library/js/services/utils.js");
        ?>
    </body>
</html>
