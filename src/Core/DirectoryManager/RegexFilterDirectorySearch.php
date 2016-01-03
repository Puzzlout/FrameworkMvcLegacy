<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package RegexFilterDirectorySearch
 */

namespace WebDevJL\Framework\Core\DirectoryManager;

class RegexFilterDirectorySearch extends BaseDirectorySearch implements \WebDevJL\Framework\Interfaces\IRecursiveDirectorySearch {

  public static function Init(\WebDevJL\Framework\Core\Application $app) {
    $instance = new RegexFilterDirectorySearch();
    $instance->DirectoryList = array();
    $instance->ContextApp = $app;
    return $instance;
  }

  public function RecursiveScanOf($directory, $algorithmFilter) {
    $scanResult = scandir($directory);
    foreach ($scanResult as $key => $value) {
      $includeKeyInResult = \WebDevJL\Framework\Helpers\RegexHelper::Init($key)->IsMatch($algorithmFilter);
      $includeValueInResult = \WebDevJL\Framework\Helpers\RegexHelper::Init($value)->IsMatch($algorithmFilter);
      $isValueADirectory = is_dir($directory . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR . $value);
      if (!$includeKeyInResult && !$includeValueInResult) {
        continue;
      }
      if ($isValueADirectory) {
        array_push($this->DirectoryList, $directory . $value . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR);
        $this->RecursiveScanOf($directory . $value . \WebDevJL\Framework\Core\DirectoryManager::DIRECTORY_SEPARATOR, $algorithmFilter);
      }
    }
    return $this->DirectoryList;
  }

}
