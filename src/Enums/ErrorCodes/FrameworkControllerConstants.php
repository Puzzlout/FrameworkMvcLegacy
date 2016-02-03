<?php

/**
 * List the constant error codes for Framework Data access layer. 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/
 * @since Version 1.0.0
 * @package FrameworkControllerConstants
 */

namespace Puzzlout\Framework\Enums\ErrorCodes;

class FrameworkControllerConstants {

    const GenericValue = 0;
    const Generic = "ErrorCodes_FrameworkController_GenericKey";
    const ControllerNotFoundValue = 1;
    const ControllerNotFound = "ErrorCodes_FrameworkController_ControllerNotFoundKey";
    const ControllerNotLoadedValue = 2;
    const ControllerNotLoaded = "ErrorCodes_FrameworkController_ControllerNotLoadedKey";

}
