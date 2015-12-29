<?php

include_once("vendor/autoload.php");
define(ROOT_DIR, dirname(dirname(__FILE__)) . "/FrameworkMvc/");
define(VENDOR, "WebDevJL");

        const CLASS_NAME_TO_TEST = "{{class_name_to_test}}";
        const CLASS_NAME = "{{class_name}}";
        const NAMESPACE_PREFIX = "WebDevJL\\Framework\\";

function GetDir($sourceDir) {
  $result = str_replace(ROOT_DIR . "src/", "", $sourceDir);
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

function CreateDirectoryInTestsFolder($dirWithFiles)
{
  $targetDir = str_replace("src", "tests", $dirWithFiles);
  $dirExists = file_exists($targetDir);
  if (!$dirExists) {
    echo "<p>Directory created => " . $targetDir . "</p>";
    mkdir($targetDir, 0777);
  }
  return $targetDir;
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
        ROOT_DIR . "src", WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
echo "<h1>Starting...</h1>";
foreach ($listOfDir as $directory => $files) {
  //create the directory if it doesn't exist...
  $targetDir = CreateDirectoryInTestsFolder($directory);
  foreach ($files as $file) {
    echo "<p>Test class " . CreateTestClass($directory, $targetDir, $file) . " was created.</p>";
  }
}

echo "<h1>Finished!</h1>\n";
