<?php

/**
 * Allows to display some data as debug on live platform.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package DebugController
 */

namespace Puzzlout\Framework\Controllers;

class DebugController extends \Puzzlout\Framework\Controllers\BaseController {

    public function ViewSessionArrays() {
        $output = array();
//    switch ($this->currentRequest()->getData("type")) {
//      case "route":
//            \Puzzlout\Framework\Helpers\DebugHelper::WriteObject(
//                    $this->user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::SessionRoutes));
//        break;
//      default:
//        break;
//    }
        die();
    }

}
