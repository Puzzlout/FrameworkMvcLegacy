<?php

/**
 * View model to use for all pages of the Web IDE.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package WebIdeVm
 */

namespace Puzzlout\Framework\ViewModels;

class WebIdeJsonVm extends BaseJsonVm implements \Puzzlout\Framework\Interfaces\IJsonViewModel {

    public static function Init(\Puzzlout\Framework\Core\Application $app) {
        $instance = new WebIdeJsonVm($app);
        return $instance;
    }

    public function __construct(\Puzzlout\Framework\Core\Application $app) {
        parent::__construct($app);
    }

    public function Fill($value) {
        if (is_array($value)) {
            $this->Response = json_encode($value, JSON_PRETTY_PRINT);
            return $this;
        }
        $this->Response = json_encode($value, JSON_PRETTY_PRINT);
        return $this;
    }

}
