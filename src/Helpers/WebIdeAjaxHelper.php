<?php

/**
 * Provides functions used by its controller, e.g. WebIdeAjaxController.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package WebIdeAjaxHelper
 */

namespace Puzzlout\Framework\Helpers;

use Puzzlout\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch;
use Puzzlout\Framework\Enums\CacheKeys;

class WebIdeAjaxHelper {

    private $ListItemArray;

    public static function Init() {
        $helper = new WebIdeAjaxHelper();
        return $helper;
    }

    /**
     * Retrieves the solution directory list. It caches the result if not already
     * done so that it retrieves it faster the next occurrences.
     * 
     * @param \Puzzlout\Framework\Core\Application $app The current application instance.
     * @return array(of String)
     */
    public function GetSolutionDirectoryList(\Puzzlout\Framework\Core\Application $app) {
        $Cacher = \Puzzlout\Framework\Core\Cache\BaseCache::Init($app->config);
        //$Cacher->Remove(CacheKeys::SOLUTION_FOLDERS);
        if (!$Cacher->KeyExists(CacheKeys::SOLUTION_FOLDERS)) {
            $SolutionPathListArray = ArrayFilterDirectorySearch::Init($app)->RecursiveScanOf(
                    "APP_ROOT_DIR", \Puzzlout\Framework\Core\DirectoryManager\Algorithms\ArrayListAlgorithm::ExcludeList());
            $Cacher->Create(CacheKeys::SOLUTION_FOLDERS, $SolutionPathListArray);
        } else {
            $SolutionPathListArray = $Cacher->Read(CacheKeys::SOLUTION_FOLDERS, array());
        }
        return $SolutionPathListArray;
    }

    public function GetSolutionFilesOnly(\Puzzlout\Framework\Core\Application $app) {
        $Cacher = \Puzzlout\Framework\Core\Cache\BaseCache::Init($app->config);
        //$Cacher->Remove(CacheKeys::SOLUTION_CLASSES);
        if (!$Cacher->KeyExists(CacheKeys::SOLUTION_CLASSES)) {
            $ArrayResult = \Puzzlout\Framework\Core\FileManager\ArrayFilterFileSearch::Init($app)->RecursiveFileTreeScanOf(
                    "APP_ROOT_DIR" . \Puzzlout\Framework\Enums\FrameworkFolderName::CORE, \Puzzlout\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
            $Cacher->Create(CacheKeys::SOLUTION_CLASSES, $ArrayResult);
        } else {
            $ArrayResult = $Cacher->Read(CacheKeys::SOLUTION_CLASSES, array());
        }
        return $ArrayResult;
    }

    /**
     * Extracts from the $FolderPathArray a list of ListItem objects that match 
     * the regexFilter.
     * 
     * @param array $FolderPathArray The array of folder to extract the values from
     * @param string $regexFilter The regex to test each folder path
     * @return array(of \Puzzlout\Framework\BO\ListItem) The array of ListIem objects ready
     */
    public function ExtractListItemsFrom($FolderPathArray, $regexFilter) {
        $this->ListItemArray = array();
        foreach ($FolderPathArray as $key => $path) {
            if ($this->IsFolderMatchingFilter($path, $regexFilter)) {
                $this->AddFolderPathToListItems($key, $path);
            }
        }
        return $this->ListItemArray;
    }

    /**
     * Test to the path against the filter.
     * 
     * @param string $path The folder path
     * @param string $regexFilter The regex to test the path 
     */
    public function IsFolderMatchingFilter($path, $regexFilter) {
        return \Puzzlout\Framework\Helpers\RegexHelper::Init($path)->IsMatch($regexFilter);
    }

    /**
     * Add a ListItem object to the field ListItemArray.
     * 
     * @param type $key
     * @param string $path The folder path
     */
    public function AddFolderPathToListItems($key, $path) {
        array_push($this->ListItemArray, \Puzzlout\Framework\BO\ListItem::Init($key, $path));
    }

    /**
     * Builds a regex value using a filter found in $dataPost array. If not found,
     * it return the regex that matches any string.
     * 
     * @param array $dataPost The $_POST array
     * @return string The regex computed.
     */
    public function GetFilterRegex($dataPost) {
        $filterKey = "filter";
        if (array_key_exists($filterKey, $dataPost)) {
            $filterRegex = '`.*' . $dataPost[$filterKey] . '.*$`';
            return $filterRegex;
        }

        $filterRegex = '`^.*$`';
        return $filterRegex;
    }

}
