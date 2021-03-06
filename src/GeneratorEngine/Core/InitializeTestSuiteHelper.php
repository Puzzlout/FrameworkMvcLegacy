<?php

/**
 * Helpers methods performing while generating the test suite.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package InitializeTestSuiteHelper
 */

namespace Puzzlout\Framework\GeneratorEngine\Core;

use Puzzlout\Framework\Helpers\RegexHelper;
use Puzzlout\Framework\Enums\CommonRegexes;

class InitializeTestSuiteHelper extends InitializeTestSuiteBaseObject {

    public static function init() {
        $instance = new InitializeTestSuiteHelper([],"","");
        return $instance;
    }

    public function checkTestFile($targetDir, $file) {
        if (is_null($file)) {
            return $this->getResultArray(false, 'Variable $file is null!');
        }
        $testfilePath = $targetDir . self::DIR_SEPARATOR . str_replace(".php", "Test.php", $file);
        $testClassExists = file_exists($testfilePath);
        $testClassContents = "";
        if ($testClassExists) {
            $testClassContents = file_get_contents($testfilePath);
        }
        if ($this->testIfTestClassIsLocked($testClassContents)) {
            return $this->getResultArray(false, "Test class is locked => $testfilePath");
        }
        if (!OVERWRITE_TEST_SUITE && $testClassExists) {
            return $this->getResultArray(false, "Test class already exists => $testfilePath");
        }
        return array(self::CLASS_CREATION_STATE => true);
    }

    public function checkSourceFile($sourceDir, $file) {
        $sourcefilePath = $sourceDir . self::DIR_SEPARATOR . $file;
        $sourceClassContents = file_get_contents($sourcefilePath);
        if (RegexHelper::Init($sourceClassContents)->IsMatch(CommonRegexes::IS_CLASS_ABSCTRACT)) {
            return $this->getResultArray(false, "Source class is abstract => $sourcefilePath");
        }
        if (RegexHelper::Init($sourceClassContents)->IsMatch(CommonRegexes::IS_FILE_INTERFACE)) {
            return $this->getResultArray(false, "Source file is an interface => $sourcefilePath");
        }
        return array(self::CLASS_CREATION_STATE => true);
    }

    public function getResultArray($state, $message) {
        return array(
            self::CLASS_CREATION_STATE => $state,
            self::CLASS_CREATION_FINAL_PATH => $message,
        );
    }

    private function testIfTestClassIsLocked($testClassContents) {
        $result = is_string($testClassContents) &&
                RegexHelper::Init($testClassContents)->IsMatch(CommonRegexes::CONTAINS_LOCKED_FLAG);
        return $result;
    }

}
