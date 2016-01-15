<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ArrayListAlgorithm
 */

namespace WebDevJL\Framework\Core\DirectoryManager\Algorithms;

class ArrayListAlgorithm {

    public static function ExcludeList() {
        return array(
            "Documentation",
            "\\.",
            "\\.\\.",
            "nbproject",
            "output",
        );
    }

}
