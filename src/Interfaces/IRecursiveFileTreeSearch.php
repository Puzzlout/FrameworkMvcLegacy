<?php

/**
 * Provides an interface to implement a recursive search in a directory of the
 * file structure to get a list of directories and files within it.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package IRecursiveFileTreeSearch
 */

namespace Puzzlout\Framework\Interfaces;

interface IRecursiveFileTreeSearch {

    /**
     * Scan a directory recursively applying an algorithm and return the filtered 
     * resulting list that is a file tree array of following structure:
     * 
     * array(
     *    0 => "file1.ext,
     *    "Dir1" => array(
     *      0 => "file1.ext",
     *      1 => "file2.ext",
     *      2 => "fileN.ext",
     *      "SubDir => array(
     *        0 => "file1.ext",
     *        1 => "file2.ext",
     *        2 => "fileN.ext",
     *      )
     *    )
     * )
     * 
     * @param string $directory The directory to scan
     * @param mixed $algorithm The filter to apply to the search
     * @return array
     */
    public function RecursiveFileTreeScanOf($directory, $algorithm);
}
