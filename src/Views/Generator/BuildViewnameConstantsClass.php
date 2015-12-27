<?php
if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}
include_once WebDevJL\Framework\Core\ViewLoader::Init($this->app->controller())->GetPartialView(\WebDevJL\Framework\Generated\FrameworkViewnames::DISPLAYGENERATEDFILES);

