<?php

namespace Puzzlout\Framework\Interfaces;

interface IViewLoader {

    public static function Init(\Puzzlout\Framework\Controllers\BaseController $controller);

    public function GetView();

    public function GetPathForView($rootDir);

    public function GetPartialView($viewName);
}
