<?php

/**
 * Provides functions with regular expressions.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package RegexHelper
 */

namespace Puzzlout\Framework\Helpers;

use Puzzlout\Framework\Enums\CommonRegexes;

class RegexHelper {

    private $List;
    private $valueToTest;

    public function __construct() {
        $this->List = array();
    }

    public function setValueToTest($valueToTest) {
        $this->valueToTest = $valueToTest;
    }

    public static function Init($valueToTest) {
        $regex = new RegexHelper();
        $regex->setValueToTest($valueToTest);
        return $regex;
    }

    public function StringContainsWhiteSpace() {
        if (is_array($this->valueToTest)) {
            return false;
        }
        $result = preg_match(CommonRegexes::SEARCH_WHITE_SPACE, $this->valueToTest);
        return $result;
    }

    public function IsResoureKeyValid() {
        $result = preg_match_all(CommonRegexes::RESOURCE_KEY_VALIDATION, $this->valueToTest);
        return $result;
    }

    public function IsAPhpFilename() {
        $result = preg_match(CommonRegexes::SEARCH_PHP_EXTENSION, $this->valueToTest);
        return $result;
    }

    public function IsMatch($pattern) {
        $result = preg_match($pattern, $this->valueToTest);
        return $result;
    }

}
