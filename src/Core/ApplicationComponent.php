<?php

namespace WebDevJL\Framework\Core;

abstract class ApplicationComponent {

  protected $app;
  protected $packageRootDir;
  protected $appName;


  public function __construct(Application $app) {
    $this->app = $app;
    $this->packageRootDir = Config::Init($app)->Get(AppSettingKeys::PACKAGE_ROOT_DIR);
    $this->appName = Config::Init($this->app)->Get(AppSettingKeys::APP_NAME);
  }

  public function app() {
    return $this->app;
  }

}
