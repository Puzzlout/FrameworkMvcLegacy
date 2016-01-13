<?php

namespace WebDevJL\Framework\Core;

abstract class ApplicationComponent {

  protected $app;
  protected $packageRootDir;
  protected $appName;


  public function __construct(Application $app) {
    $this->app = $app;
    $this->packageRootDir = Config::Init($app)->Get(AppSettingKeys::PACKAGE_ROOT_DIR);
  }

  public function app() {
    return $this->app;
  }

}
