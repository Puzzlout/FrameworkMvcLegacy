<?php

/**
 * Allows to display some data as debug on live platform.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DebugController
 */

namespace Library\Controllers;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class DebugController extends \Library\Controllers\BaseController {

  public function ViewSessionArrays() {
    $output = array();
//    switch ($this->currentRequest()->getData("type")) {
//      case "route":
//            \Library\Helpers\DebugHelper::WriteObject(
//                    $this->user->getAttribute(\Library\Enums\SessionKeys::SessionRoutes));
//        break;
//      default:
//        break;
//    }
    die();
  }

}
