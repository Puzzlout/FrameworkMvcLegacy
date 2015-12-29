<?php

include_once("vendor/autoload.php");
define(ROOT_DIR, dirname(dirname(__FILE__)) . "/FrameworkMvc/");
define(VENDOR, "WebDevJL");

        const CLASS_NAME_TO_TEST = "{{class_name_to_test}}";
        const CLASS_NAME = "{{class_name}}";
        const NAMESPACE_PREFIX = "WebDevJL\\Framework\\";
        const SOURCE_FOLDER_NAME = "src";
        const TESTS_FOLDER_NAME = "tests";
        const DIR_SEPARATOR = "/";
        
function GetDir($sourceDir) {
  $result = str_replace(ROOT_DIR . SOURCE_FOLDER_NAME . DIR_SEPARATOR, "", $sourceDir);
  $result = str_replace("/", "\\", $result);
  return $result;
}

function GetSourceClass($file) {
  $result = substr($file, strrpos($file, '/'));
  $result = str_replace(".php", "", $result);
  return $result;
}

function GetSourceClassFullName($sourceDir, $file)
{
    $dir = GetDir($sourceDir);
    $className = GetSourceClass($file);
    $result = NAMESPACE_PREFIX . $dir . "\\" . $className;
    return $result;
}

function CreateDirectories($fullDirectory)
{
  $targetDirRoot = ROOT_DIR . TESTS_FOLDER_NAME;
  $shortDirectory = str_replace($targetDirRoot . DIR_SEPARATOR, "", $fullDirectory);
  $directoryParts = explode('/', $shortDirectory);
  $dirToCheck = $targetDirRoot;
  foreach ($directoryParts as $part) {
    $dirToCheck .= DIR_SEPARATOR . $part;
    $dirExists = file_exists($dirToCheck);
    if (!$dirExists) {
      echo "<h2>Directory created => " . $dirToCheck . "</h2>";
      mkdir($dirToCheck . DIR_SEPARATOR, 0777);
    }
  }
}
function GetFullDirectoryValue($dirWithFiles)
{
  $targetDirFull = str_replace(SOURCE_FOLDER_NAME, TESTS_FOLDER_NAME, $dirWithFiles);
  CreateDirectories($targetDirFull);
  return $targetDirFull;
}

function CreateTestClass($sourceDir, $targetDir, $file) {
  if (is_null($file) || file_exists($targetDir . "/" . $file)) {
    return;
  }
  $templateContents = file_get_contents(ROOT_DIR . "TestClass.tt");
  $testClassName = str_replace(".php", "Test", $file);
  $sourceClassName = GetSourceClassFullName($sourceDir, $file);
  $testClassFullPath = $targetDir . "/" . $testClassName . ".php";
  if (!GetDir($sourceDir)) {
    return;
  }
  $placeholders = array(
      CLASS_NAME_TO_TEST => $sourceClassName,
      CLASS_NAME => $testClassName
  );
  $newTestClass = strtr($templateContents, $placeholders);
  //write the file
  $writer = fopen($testClassFullPath, 'w') or die("can't open file $testClassFullPath.");
  fwrite($writer, $newTestClass);
  fclose($writer);
  //end writing file
  return $testClassFullPath;
}

$listOfDir = \WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
        ROOT_DIR . SOURCE_FOLDER_NAME, 
        WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
echo "<h1>Starting...</h1>";
foreach ($listOfDir as $sourceDirectory => $files) {
  //create the directory if it doesn't exist...
  $targetDir = GetFullDirectoryValue($sourceDirectory);
  foreach ($files as $file) {
    echo "<p>Test class " . CreateTestClass($sourceDirectory, $targetDir, $file) . " was created.</p>";
  }
}

echo "<h1>Finished!</h1>\n";
