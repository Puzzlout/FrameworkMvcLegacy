<?php

/**
 * Class to  handle resources constants classes generation.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ResourceConstantsClassEngine
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

abstract class ResourceConstantsClassEngine extends ConstantsClassEngineBase {

  public $IsGeneratingBaseClass;

  /**
   * Generate the Constant Class list the framework.
   * 
   * @param array(of String) $data the array of data that will be used to build the list of constants
   */
  protected function GenerateConstantsClass($data) {
    if (count($data) > 0) {
      $classGen = new ResourceConstantsClassGenerator($this->params, $data);
      $classGen->BuildClass();
      return str_replace(".php", "", $classGen->fileName);
    } else {
      return "No class to generate.";
    }
  }
}
