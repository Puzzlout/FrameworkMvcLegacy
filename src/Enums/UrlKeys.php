<?php

/**
 *
 * @package     Easy MVC Framework
 * @author      Jeremie Litzler
 * @copyright   Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * UrlKeys Class
 *
 * @package       Library
 * @category    Enums
 * @category      
 * @author        Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Enums;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class UrlKeys {

  const LoginUrl = "login";
  const LogoutUrl = "logout";
  const AuthenticationUrl = "auth";

}
