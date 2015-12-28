<?php
    include_once("vendor/autoload.php");
    define(ROOT_DIR, dirname(dirname(__FILE__)) . "/FrameworkMvc/");
    define(VENDOR, "WebDevJL");
    
    const CLASS_NAME_TO_TEST = "class_name_to_test";
    const CLASS_NAME = "class_name";

    function CreateDirectoryInTestsFolder($dirWithFiles)
    {
        $targetDir = str_replace("src", "tests", $dirWithFiles);
        $dirExists = file_exists($targetDir);
        if(!$dirExists) 
        {
            echo $targetDir . "</ br>";
            mkdir($targetDir, 0777);
        }
        return $targetDir;
    }
    function CreateTestClass($targetDir, $file)
    {
        if(is_null($file) || file_exists($targetDir . "/" . $file)) 
        {
            return;
        }
        //create the test class...
        $template = file_get_contents(ROOT_DIR."TestClass.tt");
        $testClassName = $file . 'Test';
        $testClassFullPath = $targetDir . $file;
        $placeholders = array(
            CLASS_NAME => $file . "Test",
            CLASS_NAME_TO_TEST => $file
            );
        $newTestClass = "";
        return $testClassFullPath;
    }
    
    $listOfDir = \WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
        ROOT_DIR . "src/",
        WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
    echo "<b>Starting...</b>";
    foreach ($listOfDir as $directory => $files) {
        //create the directory if it doesn't exist...
        $targetDir = CreateDirectoryInTestsFolder($directory);
        foreach ($files as $file) {
            echo "Test class " . CreateTestClass($targetDir, $file) . " was created.</ br>";
        }
    }

    echo "<b>Finished!</b>";