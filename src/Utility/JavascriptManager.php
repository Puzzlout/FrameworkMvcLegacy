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
 * JavascriptManager Class
 *
 * @package       Library
 * @category    Utility
 * @category      
 * @author        Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Utility;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class JavascriptManager extends \WebDevJL\Framework\Core\ApplicationComponent {

  /**
   *
   * @var array $files Javascript files list
   */
  protected $files = array();

  public function __construct(\WebDevJL\Framework\Core\Application $app) {
    parent::__construct($app);
  }

}
