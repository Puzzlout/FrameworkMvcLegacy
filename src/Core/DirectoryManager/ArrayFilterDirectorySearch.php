<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ArrayFilterDirectorySearch
 */

namespace WebDevJL\Framework\Core\DirectoryManager;

class ArrayFilterDirectorySearch extends BaseDirectorySearch implements \WebDevJL\Framework\Interfaces\IRecursiveDirectorySearch {

    /**
     * @see \WebDevJL\Framework\Interfaces\IObjectInitialization
     * @return \WebDevJL\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch
     */
    public static function Init(\WebDevJL\Framework\Core\Application $app) {
        $instance = new ArrayFilterDirectorySearch();
        $instance->DirectoryList = array();
        $instance->ContextApp = $app;
        return $instance;
    }

    /**
     * 
     */
    public static function InitWithoutApp() {
        $instance = new ArrayFilterDirectorySearch();
        $instance->DirectoryList = array();
        return $instance;
    }

    public function RecursiveScanOf($directory, $algorithmFilter) {
        $scanResult = scandir($directory);
        foreach ($scanResult as $key => $value) {
            $includeValueInResult = $this->DoIncludeInResult($value, $algorithmFilter);
            $isValueADirectory = is_dir($directory . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR . $value);
            if (!$includeValueInResult) {
                continue;
            }
            if ($isValueADirectory) {
                array_push($this->DirectoryList, $directory . $value . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR);
                $this->RecursiveScanOf($directory . $value . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR, $algorithmFilter);
            }
        }
        return $this->DirectoryList;
    }

    private function DoIncludeInResult($valueToCheck, $algorithmFilter) {
        foreach ($algorithmFilter as $filter) {
            if (strcmp($valueToCheck, $filter) === 0) {
                return false;
            }
            if (\WebDevJL\Framework\Helpers\RegexHelper::Init($valueToCheck)->IsMatch('`' . $filter . '`')) {
                return false;
            }
        }
        return true;
    }

}
