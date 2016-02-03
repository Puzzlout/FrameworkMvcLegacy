<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package RegexFilterDirectorySearch
 */

namespace Puzzlout\Framework\Core\DirectoryManager;

class RegexFilterDirectorySearch extends BaseDirectorySearch implements \Puzzlout\Framework\Interfaces\IRecursiveDirectorySearch {

    public static function Init(\Puzzlout\Framework\Core\Application $app) {
        $instance = new RegexFilterDirectorySearch();
        $instance->DirectoryList = array();
        $instance->ContextApp = $app;
        return $instance;
    }

    public function RecursiveScanOf($directory, $algorithmFilter) {
        $scanResult = scandir($directory);
        foreach ($scanResult as $key => $value) {
            $includeKeyInResult = \Puzzlout\Framework\Helpers\RegexHelper::Init($key)->IsMatch($algorithmFilter);
            $includeValueInResult = \Puzzlout\Framework\Helpers\RegexHelper::Init($value)->IsMatch($algorithmFilter);
            $isValueADirectory = is_dir($directory . \Puzzlout\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR . $value);
            if (!$includeKeyInResult && !$includeValueInResult) {
                continue;
            }
            if ($isValueADirectory) {
                array_push($this->DirectoryList, $directory . $value . \Puzzlout\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR);
                $this->RecursiveScanOf($directory . $value . \Puzzlout\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR, $algorithmFilter);
            }
        }
        return $this->DirectoryList;
    }

}
