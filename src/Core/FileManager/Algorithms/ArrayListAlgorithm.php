<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ArrayListAlgorithm
 */

namespace Puzzlout\Framework\Core\FileManager\Algorithms;

class ArrayListAlgorithm {

    public static function Init() {
        $instance = new ArrayListAlgorithm();
        return $instance;
    }

    public static function ExcludeList() {
        return array(
            "\\.",
            "\\.\\.",
        );
    }

    public function ExcludeListForTestSuite() {
        $specific = array(
            "src",
            "Generator",
            ".DS_Store",
            "FrameworkConstants.php",
            "Mailer",
        );
        $list = array_merge($specific, self::ExcludeList());
        return $list;
    }

}
