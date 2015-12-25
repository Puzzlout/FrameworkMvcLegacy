<?php

/**
* @author Jeremie Litzler
* @copyright Copyright (c) 2015
* @licence http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/WebDevJL/
* @since Version 1.0.0
* @package DatabaseToPhpTypeHelper
*/

namespace Library\Dal\Generator;

if (!FrameworkConstants_ExecutionAccessRestriction)
  exit('No direct script access allowed');

class DatabaseToPhpTypeHelper {
  public static function GetPhpTypeFromDatabaseColumnType($columnType) {
    var_dump($columnType);
    throw new \Library\Exceptions\NotImplementedException();   
  } 
}