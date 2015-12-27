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
 * NameSpaceName Class
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

abstract class NameSpaceName {

  const VENDOR = "\\WebDevJL";
  const FRAMEWORK = "\\Framework\\";
  const LibFolderName = "\\Library";
  const LibControllersFolderName = "\\Controllers\\";
  const AppsFolderName = "Applications";
  const AppsControllersFolderName = "\\Controllers\\";

}

?>
