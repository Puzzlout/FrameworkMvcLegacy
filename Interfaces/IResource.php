<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package IResource
 */

namespace Library\Interfaces;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

interface IResource {
  /**
   * Method that retrieve the array of resources.
   */
  public function GetList();
    /**
   * Get the resource value by group and key. See implementation the derived classes.
   * 
   * @param string $key the resource key to find
   */
  public function GetValue($key);
    /**
   * Get the resource comment by key. See implementation the derived classes.
   * 
   * @param string $key the resource key to find
   */
  public function GetComment($key);

}
