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
 * Error Class
 *
 * @package       Library
 * @category    BO
 * @author        Jeremie Litzler
 * @link		
 */

namespace Library\BO;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class Error {

  public
  /**
   * Error identifier
   * See: Library\Enums\ErrorCode.php
   */
          $errorId = 0,
          /**
           * Error origin
           * See: Library\Enums\ErrorOrigin.php
           */
          $errorOrigin = "",
          /**
           * 
           */
          $errorDynamicValue = "",
          /**
           * 
           */
          $errorTitle = "",
          /**
           * 
           */
          $errorMessage = "";

  //GETTERS
  public function errorId() {
    return $this->errorId;
  }

  public function errorOrigin() {
    return $this->errorOrigin;
  }

  public function errorDynamicValue() {
    return $this->errorDynamicValue;
  }

  public function errorTitle() {
    return $this->errorTitle;
  }

  public function errorMessage() {
    return $this->errorMessage;
  }

  //SETTERS
  public function setErrorId($errorId) {
    $this->errorId = is_int($errorId) ? $errorId : FALSE;
  }

  public function setErrorOrigin($errorOrigin) {
    $this->errorOrigin = $errorOrigin;
  }

  public function setErrorDynamicValue($errorDynamicValue) {
    $this->errorDynamicValue = $errorDynamicValue;
  }

  public function setErrorTitle($errorTitle) {
    $this->errorTitle = $errorTitle;
  }

  public function setErrorMessage($errorMessage) {
    $this->errorMessage = $errorMessage;
  }

  /**
   * 
   * @param type $id
   * @param type $type
   * @param type $title
   * @param type $dynamicValue
   */
  public function __construct($id, $origin, $title, $message) {
    $this->setErrorId($id);
    $this->setErrorOrigin($origin);
    $this->setErrorTitle($title);
    $this->setErrorMessage($message);
  }

}
