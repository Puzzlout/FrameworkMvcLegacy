<?php

namespace WebDevJL\Framework\Core;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class Context extends ApplicationComponent {

  public $defaultLang = null;

  public function __construct(Application $app) {
    parent::__construct($app);
  }

  public function setLanguage() {
    $this->defaultLang = $this->app->cultures[$this->app->config()->Get(\WebDevJL\Framework\Enums\AppSettingKeys::DefaultCulture)];
  }

}
