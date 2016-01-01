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

class InitializeTestSuite {

  const CLASS_NAME_TO_TEST = "{{class_name_to_test}}";
  const FULL_CLASS_NAME_TO_TEST = "{{full_class_name_to_test}}";
  const TEST_CLASS_NAME = "{{test_class_name}}";
  const TEST_CLASS_NAMESPACE = "{{test_class_namespace}}";
  const SOURCE_NAMESPACE_PREFIX = "WebDevJL\\Framework\\";
  const TEST_NAMESPACE_PREFIX = "WebDevJL\\Framework\\Tests";
  const SOURCE_FOLDER_NAME = "src";
  const TESTS_FOLDER_NAME = "tests";
  const DIR_SEPARATOR = "/";
  const CLASS_CREATION_STATE = "test_class_state";
  const CLASS_CREATION_FINAL_PATH = "test_class_filepath";

  public $output;

  public static function Init() {
    $instance = new InitializeTestSuite();
    return $instance;
  }

  public function ProcessSourceFolder() {
    $listOfDir = \WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
            ROOT_DIR . self::SOURCE_FOLDER_NAME, \WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::Init()->ExcludeListForTestSuite());
    if (TESTING_FILE_TREE) {
      var_dump($listOfDir);
      return;
    }
    foreach ($listOfDir as $sourceDirectory => $files) {
      $targetDir = $this->GetFullDirectoryValue($sourceDirectory);
      $this->CreateTestClasses($sourceDirectory, $targetDir, $files);
    }
    return $this;
  }

  private function GetShortDir($dir, $specificDirPart) {
    $shortDirectory = str_replace(ROOT_DIR . $specificDirPart . self::DIR_SEPARATOR, "", $dir);
    $shortDirectory = str_replace("/", "\\", $shortDirectory);
    return $shortDirectory;
  }

  private function GetSourceClass($file) {
    $result = substr($file, strrpos($file, '/'));
    $result = str_replace(".php", "", $result);
    return $result;
  }

  private function GetSourceClassFullName($sourceDir, $file) {
    $dir = $this->GetShortDir($sourceDir, self::SOURCE_FOLDER_NAME);
    $className = $this->GetSourceClass($file);
    $result = self::SOURCE_NAMESPACE_PREFIX . $dir . "\\" . $className;
    return $result;
  }

  private function GetTestClassNamespace($testDir) {
    $dir = $this->GetShortDir($testDir, self::TESTS_FOLDER_NAME);
    $result = self::TEST_NAMESPACE_PREFIX . "\\" . $dir;
    return $result;
  }

  private function CreateDirectories($fullDirectory) {
    $targetDirRoot = ROOT_DIR . self::TESTS_FOLDER_NAME;
    $shortDirectory = str_replace($targetDirRoot . self::DIR_SEPARATOR, "", $fullDirectory);
    $directoryParts = explode('/', $shortDirectory);
    foreach ($directoryParts as $part) {
      $this->CreateDirectory($targetDirRoot, $part);
      $targetDirRoot .= self::DIR_SEPARATOR . $part;
    }
  }

  private function CreateDirectory($targetDirRoot, $part) {
    $dirToCheck = $targetDirRoot . self::DIR_SEPARATOR . $part;
    $dirExists = file_exists($dirToCheck);
    if (!$dirExists) {
      $state = mkdir($dirToCheck . self::DIR_SEPARATOR, 0777);
    }
    if ($dirExists) {
      $this->output .= "<p class=\"dir-exists\">Directory already exists => $dirToCheck</p>";
      return;
    }
    if (!$state) {
      error_log("Directory not created => " . $dirToCheck);
      $this->output .= "<p class=\"dir-not-created\">Directory not created => $dirToCheck</p>";
      return;
    }
    $this->output .= "<p class=\"dir-created\">Directory created => $dirToCheck</p>";
  }

  private function GetFullDirectoryValue($dirWithFiles) {
    $targetDirFull = str_replace(self::SOURCE_FOLDER_NAME, self::TESTS_FOLDER_NAME, $dirWithFiles);
    $this->CreateDirectories($targetDirFull);
    return $targetDirFull;
  }

  private function CreateTestClasses($sourceDirectory, $targetDir, $files) {
    foreach ($files as $file) {
      $result = $this->CreateTestClass($sourceDirectory, $targetDir, $file);
      if (!$result[self::CLASS_CREATION_STATE]) {
        $this->output .= "<p class=\"test-class-not-created\">Test class was not created => " . $result[self::CLASS_CREATION_FINAL_PATH] . "</p>";
        continue;
      }
      $this->output .= "<p class=\"test-class-created\">Test class was created => " . $result[self::CLASS_CREATION_FINAL_PATH] . "</p>";
    }
  }

  private function CreateTestClass($sourceDir, $targetDir, $file) {
    if (is_null($file) || file_exists($targetDir . "/" . $file)) {
      return;
    }
    $templateContents = file_get_contents(ROOT_DIR . "TestClass.tt");
    $testClassName = str_replace(".php", "Test", $file);
    $sourceClassName = str_replace(".php", "", $file);
    $testClassFullPath = $targetDir . "/" . $testClassName . ".php";
    $placeholders = array(
        self::FULL_CLASS_NAME_TO_TEST => $this->GetSourceClassFullName($sourceDir, $file),
        self::CLASS_NAME_TO_TEST => $sourceClassName,
        self::TEST_CLASS_NAME => $testClassName,
        self::TEST_CLASS_NAMESPACE => $this->GetTestClassNamespace($targetDir),
    );
    $newTestClassContents = strtr($templateContents, $placeholders);
    if (SKIP_TEST_CLASSES_GENERATION) {
      var_dump($placeholders);
      return;
    }
    $result = $this->WriteTestClassFile($testClassFullPath, $newTestClassContents);
    return array(self::CLASS_CREATION_STATE => $result, self::CLASS_CREATION_FINAL_PATH => $testClassFullPath);
  }

  private function WriteTestClassFile($classPath, $classContents) {
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
    $status = fclose($writer);
    return $status;
  }

}
