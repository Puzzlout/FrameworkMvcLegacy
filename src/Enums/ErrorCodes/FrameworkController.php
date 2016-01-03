<?php

/**
 * List the error codes for Framework Data access layer. 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package FrameworkDal
 */

namespace WebDevJL\Framework\Enums\ErrorCodes;

class FrameworkController {

  const Prefix = "controller_";

  public static function GetErrorCodes() {
    return array(
        FrameworkControllerConstants::Generic => self::BuildValue(FrameworkControllerConstants::GenericValue),
        FrameworkControllerConstants::ControllerNotFound => self::BuildValue(FrameworkControllerConstants::ControllerNotFoundValue)
    );
  }

  public static function BuildValue($unprefixedValue) {
    return self::Prefix . $unprefixedValue;
  }

  public static function GetErrorCode($key) {
    $fullKey = self::Prefix . $key;
    $codes = self::GetErrorCodes();
    return $codes[$fullKey];
  }

}
