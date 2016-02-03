<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ArrayFilterFileSearch
 */

namespace Puzzlout\Framework\Core\FileManager;

class ArrayFilterFileSearch extends BaseFileSearch implements \Puzzlout\Framework\Interfaces\IRecursiveFileTreeSearch {

    /**
     * Builds the instance of class
     * 
     * @return \Puzzlout\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch
     */
    public static function Init(\Puzzlout\Framework\Core\Application $app) {
        $instance = new ArrayFilterFileSearch();
        $instance->FileList = array();
        $instance->ContextApp = $app;
        return $instance;
    }

    /**
     * Builds the instance of class
     * 
     * @return \Puzzlout\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch
     */
    public static function InitWithoutApp() {
        $instance = new ArrayFilterFileSearch();
        $instance->FileList = array();
        return $instance;
    }

    public function RecursiveFileTreeScanOf($directory, $algorithmFilter) {
        $scanResult = scandir($directory);
        foreach ($scanResult as $key => $value) {
            $includeValueInResult = $this->DoIncludeInResult($value, $algorithmFilter);
            $isValueADirectory = is_dir($directory . "/" . $value);

            if (!$includeValueInResult) {
                continue;
            }
            if ($isValueADirectory) {
                $this->RecursiveFileTreeScanOf($directory . "/" . $value, $algorithmFilter);
                continue;
            }
            $this->AddFileToResult($directory, $value);
        }
        return $this->FileList;
    }

    /**
     * Add a file to the result list in the proper subarray using the directory.
     * 
     * @param string $directory The directory where resides the file
     * @param string $file The file name
     */
    private function AddFileToResult($directory, $file) {
        if (array_key_exists($directory, $this->FileList)) {
            array_push($this->FileList[$directory], $file);
            return;
        }
        //array_push($this->FileList, $directory);
        $this->FileList[$directory] = [$file];
    }

    private function DoIncludeInResult($valueToCheck, $algorithmFilter) {
        if (is_null($valueToCheck)) {
            return false;
        }
        foreach ($algorithmFilter as $filter) {
            if (strcmp($valueToCheck, $filter) === 0) {
                return false;
            }
            if (\Puzzlout\Framework\Helpers\RegexHelper::Init($valueToCheck)->IsMatch('`^' . $filter . '$`')) {
                return false;
            }
        }
        return true;
    }

}
