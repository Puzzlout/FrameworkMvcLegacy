<?php

/**
 *
 * @package      Framework
 * @author      Jeremie Litzler
 * @copyright   Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * ErrorHelper Class
 *
 * @package       Library
 * @category    Helpers
 * @author        Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Helpers;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class ErrorHelper {

  public static function EchoError(\Exception $ex) {
    
  }

}
