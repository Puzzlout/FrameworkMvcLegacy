<?php

/**
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package Error
 */

namespace WebDevJL\Framework\BO;

class Error {

    public
    /**
     * Error identifier
     * See: WebDevJL\Framework\Enums\ErrorCode.php
     */
            $errorId = 0,
            /**
             * Error origin
             * See: WebDevJL\Framework\Enums\ErrorOrigin.php
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
        $this->errorId = is_int($errorId) ? $errorId : false;
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
