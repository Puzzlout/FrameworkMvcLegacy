<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ResourceNotFoundException
 */

namespace Puzzlout\Framework\Exceptions;

class ResourceNotFoundException extends \Exception {

    public function __construct($message = "Resource not found", $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous); //todo: generate error code.
    }

}
