<?php

/**
 * Class that generates the initial test suite.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package InitializeTestSuite
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

use WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch;
use WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm;

class InitializeTestSuite extends InitializeTestSuiteBaseObject {

    /**
     * The constructor
     * @param array $exceptionFilters The list of exception filters to merge the common filters
     * @param string $soureNamespacePrefix The namespace prefix for the source classes
     * @param string $testNamespacePrefix The namespace prefix for the test classes
     */
    public function __construct($exceptionFilters, $soureNamespacePrefix, $testNamespacePrefix) {
        parent::__construct($exceptionFilters, $soureNamespacePrefix, $testNamespacePrefix);
    }

    public static function init($exceptionFilters, $soureNamespacePrefix, $testNamespacePrefix) {
        $instance = new InitializeTestSuite($exceptionFilters, $soureNamespacePrefix, $testNamespacePrefix);
        return $instance;
    }

    public function processSourceFolder() {
        $fullExcludeList = array_merge(ArrayListAlgorithm::Init()->ExcludeListForTestSuite(), $this->ExceptionFilters);
        $listOfDir = ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
                ROOT_DIR . self::SOURCE_FOLDER_NAME, $fullExcludeList);
        if (TESTING_FILE_TREE) {
            var_dump($listOfDir);
            return;
        }
        foreach ($listOfDir as $sourceDirectory => $files) {
            $targetDir = $this->getFullDirectoryValue($sourceDirectory);
            $this->createTestClasses($sourceDirectory, $targetDir, $files);
        }
        return $this;
    }

    private function getShortDir($dir, $specificDirPart) {
        $shortDirectory = str_replace(ROOT_DIR . $specificDirPart . self::DIR_SEPARATOR, "", $dir);
        $shortDirectory = str_replace("/", "\\", $shortDirectory);
        return $shortDirectory;
    }

    private function getSourceClass($file) {
        $result = substr($file, strrpos($file, '/'));
        $result = str_replace(".php", "", $result);
        return $result;
    }

    private function getSourceClassFullName($sourceDir, $file) {
        $dir = $this->getShortDir($sourceDir, self::SOURCE_FOLDER_NAME);
        $className = $this->getSourceClass($file);
        $result = $this->SourceNamespacePrefix . $dir . "\\" . $className;
        return $result;
    }

    private function getTestClassNamespace($testDir) {
        $dir = $this->getShortDir($testDir, self::TESTS_FOLDER_NAME);
        $result = $this->TestNamespacePrefix . "\\" . $dir;
        return $result;
    }

    private function createDirectories($fullDirectory) {
        $targetDirRoot = ROOT_DIR . self::TESTS_FOLDER_NAME;
        $shortDirectory = str_replace($targetDirRoot . self::DIR_SEPARATOR, "", $fullDirectory);
        $directoryParts = explode('/', $shortDirectory);
        foreach ($directoryParts as $part) {
            $this->createDirectory($targetDirRoot, $part);
            $targetDirRoot .= self::DIR_SEPARATOR . $part;
        }
    }

    private function createDirectory($targetDirRoot, $part) {
        $dirToCheck = $targetDirRoot . self::DIR_SEPARATOR . $part;
        $dirExists = file_exists($dirToCheck);
        if (!$dirExists) {
            $state = mkdir($dirToCheck . self::DIR_SEPARATOR, 0777);
        }
        if ($dirExists) {
            $this->output .= "<p class=\"dir exists\">Directory already exists => $dirToCheck</p>";
            return;
        }
        if (!$state) {
            error_log("Directory not created => " . $dirToCheck);
            $this->output .= "<p class=\"dir not-created\">Directory not created => $dirToCheck</p>";
            return;
        }
        $this->output .= "<p class=\"dir created\">Directory created => $dirToCheck</p>";
    }

    private function getFullDirectoryValue($dirWithFiles) {
        $targetDirFull = str_replace(self::SOURCE_FOLDER_NAME, self::TESTS_FOLDER_NAME, $dirWithFiles);
        $this->createDirectories($targetDirFull);
        return $targetDirFull;
    }

    private function createTestClasses($sourceDirectory, $targetDir, $files) {
        foreach ($files as $file) {
            $result = $this->createTestClass($sourceDirectory, $targetDir, $file);
            if (!$result[self::CLASS_CREATION_STATE]) {
                $this->output .=
                        "<p class=\"test-class not-created\">Test class was not created => " .
                        $result[self::CLASS_CREATION_FINAL_PATH] .
                        "</p>";
                continue;
            }
            $this->output .=
                    "<p class=\"test-class created\">Test class was generated => " .
                    $result[self::CLASS_CREATION_FINAL_PATH] .
                    "</p>";
        }
    }

    private function createTestClass($sourceDir, $targetDir, $file) {
        $resultCheckForTest = InitializeTestSuiteHelper::init()->checkTestFile($targetDir, $file);
        if (!$resultCheckForTest[self::CLASS_CREATION_STATE]) {
            return $resultCheckForTest;
        }
        $resultCheckForSource = InitializeTestSuiteHelper::init()->checkSourceFile($sourceDir, $file);
        if (!$resultCheckForSource[self::CLASS_CREATION_STATE]) {
            return $resultCheckForSource;
        }
        $testClassName = str_replace(".php", "Test", $file);
        $testClassFullPath = $targetDir . "/" . $testClassName . ".php";
        $placeholders = $this->getPlaceholders($sourceDir, $targetDir, $file, $testClassName);
        if (SKIP_TEST_CLASSES_GENERATION) {
            var_dump($placeholders);
            return InitializeTestSuiteHelper::init()->getResultArray(false, $testClassFullPath);
            ;
        }
        $newTestClassContents = $this->generateTestClassContents($placeholders);
        $result = $this->writeTestClassFile($testClassFullPath, $newTestClassContents);
        return InitializeTestSuiteHelper::init()->getResultArray($result, $testClassFullPath);
    }

    private function generateTestClassContents($placeholders) {
        $templateContents = file_get_contents(ROOT_DIR . "TestClass.tt");
        $newTestClassContents = strtr($templateContents, $placeholders);
        return $newTestClassContents;
    }

    private function getPlaceholders($sourceDir, $targetDir, $file, $testClassName) {
        $sourceClassName = str_replace(".php", "", $file);
        return array(
            self::FULL_CLASS_NAME_TO_TEST => $this->getSourceClassFullName($sourceDir, $file),
            self::CLASS_NAME_TO_TEST => $sourceClassName,
            self::TEST_CLASS_NAME => $testClassName,
            self::TEST_CLASS_NAMESPACE => $this->getTestClassNamespace($targetDir),
            self::TEST_SUITE_VERSION => TEST_SUITE_VERSION,
        );
        ;
    }

    private function writeTestClassFile($classPath, $classContents) {
        $writer = fopen($classPath, 'w');
        if (!$writer) {
            error_log("$classPath couldn't be created.");
            return $writer;
        }
        $status = fwrite($writer, $classContents);
        if (!$status) {
            error_log("$classPath couldn't be written.");
            return $status;
        }
        $status2 = fclose($writer);
        return $status2;
    }

}
