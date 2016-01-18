<?php

namespace WebDevJL\Framework\Core;

class Config extends ApplicationComponent {

    protected $settings = array();

    /**
     * Initialize the class instance.
     * 
     * @param \WebDevJL\Framework\Core\Application $app
     * @return \WebDevJL\Framework\Core\Config
     */
    public static function Init(Application $app) {
        $instance = new Config($app);
        $instance->AssignSettingsToArray();
        return $instance;
    }

    /**
     * Constructor stores the current application instance in class object.
     * @param \WebDevJL\Framework\Core\Application $app
     */
    public function __construct(Application $app) {
        parent::__construct($app);
    }

    /**
     * Sets the appsettings to the $settings array associatively.
     * 
     * @param string $SettingsClass
     */
    private function AssignSettingsToArray() {
        try {
            if ($this->app->UnitTestingEnabled) {
                $SettingsClass = "\\WebDevJL\\Framework\\Tests\\AppSettings";
                $this->settings[$this->app->name] = $SettingsClass::Init()->GetSettings();
                return;
            }
            $SettingsClass = "\\Applications\\" . $this->app->name . "\\Config\\AppSettings";
            $this->settings[$this->app->name] = $SettingsClass::Init()->GetSettings();
        } catch (\ErrorException $exc) {
            throw new \RuntimeException("Couldn't execute the method $GetMethod in $SettingsClass", 0, $exc);
        }
    }

    /**
     * Gets the value for the given key.
     * @param string $key
     * @param string $appName Optional parameter when we need to access another Application settings
     * @return boolean|string : The value associated to the key given. Otherwise false
     */
    public function Get($key, $appName = NULL) {
        if (!is_null($appName) && (!$this->settings || !isset($this->settings[$appName]) || !isset($this->settings[$appName][$key]))) {
            throw new \RuntimeException("$key was not found in the Settings for " . $appName . ". See above array. " . var_dump($this->settings), 0, NULL);
        }
        if ((!$this->settings || !isset($this->settings[$this->app->name]) || !isset($this->settings[$this->app->name][$key]))) {
            throw new \RuntimeException("$key was not found in the Settings for " . $this->app->name . ". See above array. " . var_dump($this->settings), 0, NULL);
        } else {
            $appName = $this->app->name;
        }
        return $this->settings[$appName][$key];
    }

}
