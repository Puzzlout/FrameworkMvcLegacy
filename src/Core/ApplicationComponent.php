<?php

namespace WebDevJL\Framework\Core;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

abstract class ApplicationComponent {

  protected $app;

  public function __construct(Application $app) {
    $this->app = $app;
  }

  public function app() {
    return $this->app;
  }

}
