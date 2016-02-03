<?php

/**
 * Common DateTime operations.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMVC
 * @since Version 1.0.0
 * @package DateTimeHelper
 */

namespace Puzzlout\Framework\Utility;

class DateTimeHelper {

    public static function GetDateTimeWithMs($time) {
        $micro = sprintf("%06d", ($time - floor($time)) * 1000000);
        $dateTime = new \DateTime(date('Y-m-d H:i:s.' . $micro, $time));
        $formattedTime = $dateTime->format("Y-m-d H:i:s.u");
        return $formattedTime;
    }

}
