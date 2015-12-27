<?php

namespace WebDevJL\Framework\Interfaces;

interface IViewLoader {
  public static function Init(\WebDevJL\Framework\Controllers\BaseController $controller);
  public function GetView();
  public function GetPathForView($rootDir);
  public function GetPartialView($viewName);
}
