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
        const CLASS_NAME = "{{class_name}}";
        const NAMESPACE_PREFIX = "WebDevJL\\Framework\\";
        const SOURCE_FOLDER_NAME = "src";
        const TESTS_FOLDER_NAME = "tests";
        const DIR_SEPARATOR = "/";
        
    public static function Init()
    {
        $instance = new InitializeTestSuite();
        return $instance;
    }
    
    public function ProcessSourceFolder()
    {
        $listOfDir = 
            \WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
                ROOT_DIR . SOURCE_FOLDER_NAME, 
                WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
        echo "<h1>Starting...</h1>";
        foreach ($listOfDir as $sourceDirectory => $files)
        {
            $targetDir = GetFullDirectoryValue($sourceDirectory);
            foreach ($files as $file)
            {
                echo "<p>Test class " . CreateTestClass($sourceDirectory, $targetDir, $file) . " was created.</p>";
            }
        }
    }
    
    private function GetShortDir($sourceDir) 
    {
        $shortDirectory = str_replace(ROOT_DIR . SOURCE_FOLDER_NAME . DIR_SEPARATOR, "", $sourceDir);
        $shortDirectory = str_replace("/", "\\", $shortDirectory);
        return $shortDirectory;
    }
    
    private function GetSourceClass($file) 
    {
        $result = substr($file, strrpos($file, '/'));
        $result = str_replace(".php", "", $result);
        return $result;
    }
    
    private function GetSourceClassFullName($sourceDir, $file)
    {
        $dir = $this->GetShortDir($sourceDir);
        $className = $this->GetSourceClass($file);
        $result = NAMESPACE_PREFIX . $dir . "\\" . $className;
        return $result;
    }

    private function CreateDirectories($fullDirectory)
    {
        $targetDirRoot = ROOT_DIR . TESTS_FOLDER_NAME;
        $shortDirectory = str_replace($targetDirRoot . DIR_SEPARATOR, "", $fullDirectory);
        $directoryParts = explode('/', $shortDirectory);
        $dirToCheck = $targetDirRoot;
        foreach ($directoryParts as $part)
        {
            $this->CreateDirectory($part);
        }
    }
    
    private function CreateDirectory($part)
    {
        
        $dirToCheck .= DIR_SEPARATOR . $part;
        $dirExists = file_exists($dirToCheck);
        if (!$dirExists) 
        {
            $state = mkdir($dirToCheck . DIR_SEPARATOR, 0777);
        }
        if(!$state)
        {
            error_log("Directory not created => " . $dirToCheck);
            echo "<h2>Directory not created => " . $dirToCheck . "</h2>";
        }
        echo "<h2>Directory created => " . $dirToCheck . "</h2>";
    }
    
    private function GetFullDirectoryValue($dirWithFiles)
    {
        $targetDirFull = str_replace(SOURCE_FOLDER_NAME, TESTS_FOLDER_NAME, $dirWithFiles);
        $this->CreateDirectories($targetDirFull);
        return $targetDirFull;
    }
    
    private function CreateTestClass($sourceDir, $targetDir, $file) 
    {  
        if (is_null($file) || file_exists($targetDir . "/" . $file))
        {
            return;
        }
        $templateContents = file_get_contents(ROOT_DIR . "TestClass.tt");
        $testClassName = str_replace(".php", "Test", $file);
        $sourceClassName = $this->GetSourceClassFullName($sourceDir, $file);
        $testClassFullPath = $targetDir . "/" . $testClassName . ".php";
        if (!$this->GetShortDir($sourceDir)) {
            return;
        }
        $placeholders = array(
            CLASS_NAME_TO_TEST => $sourceClassName,
            CLASS_NAME => $testClassName
        );
        $newTestClassContents = strtr($templateContents, $placeholders);
        $result = $this->WriteTestClassFile($testClassFullPath, $newTestClassContents);
        return array("Result" => $result, "FilePath" => $testClassFullPath);
    }
    private function WriteTestClassFile()
    {
        $writer = fopen($testClassFullPath, 'w');
        if(!$writer)
        {
            error_log("$testClassFullPath couldn't be created.");
            return $writer;
        }
        $status = fwrite($writer, $newTestClass);
        if(!$status)
        {
            error_log("$testClassFullPath couldn't be written.");
            return $status;
        }
        $status = fclose($writer);
        return $status;
    }
}