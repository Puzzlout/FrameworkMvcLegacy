<?php

/**
 *
 * @package		Easy MVC Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * DebugHelper Class
 *
 * @package		Library
 * @category	Utility
 * @category	
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Helpers;

class DebugHelper {

    /**
     * Print out a string.
     * 
     * @param string $stringData
     */
    public static function WriteString($stringData, $useJson = false) {
        if ($useJson) {
            echo json_encode('{"data":' . $stringData . '}');
        } else {
            echo '<!-- ' . $stringData . ' -->';
        }
    }

    public static function WriteObject($object, $useJson = false) {
        if ($useJson) {
            echo json_encode('{"data":' . var_dump($object) . '}');
        } else {
            echo '<!-- ' . var_dump($object) . ' -->';
        }
    }

}
