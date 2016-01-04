<?php

namespace WebDevJL\Framework\Core;

use WebDevJL\Framework\BO\F_culture;

class Context extends ApplicationComponent {

  public $defaultLang = null;
  
  public static function Init(Application $app) {
    $instance = new Context($app);
    return $instance;
  }
  
  public function __construct(Application $app) {
    parent::__construct($app);
  }

  public function setLanguage() {
    $this->defaultLang = $this->app->cultures[Config::Init($this->app)->Get(\WebDevJL\Framework\Enums\AppSettingKeys::DefaultCulture)];
  }
  
  public function GetCultureLang() {
    if(is_null($this->defaultLang)) {
      throw new Exception("Member defaultLang should not be null!", 0, NULL);
    }
    return $this->defaultLang[F_culture::F_CULTURE_LANGUAGE];
  }

  public function GetCultureRegion() {
    if(is_null($this->defaultLang)) {
      throw new Exception("Member defaultLang should not be null!", 0, NULL);
    }
    return $this->defaultLang[F_culture::F_CULTURE_REGION];
  }

  public function GetCultureID() {
    if(is_null($this->defaultLang)) {
      throw new Exception("Member defaultLang should not be null!", 0, NULL);
    }
    return $this->defaultLang[F_culture::F_CULTURE_ID];
  }

}
