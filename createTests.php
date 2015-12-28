<?php
    include_once("vendor/autoload.php");
    define(ROOT_DIR, dirname(dirname(__FILE__)) . "/FrameworkMvc/src/");
    
    $list = \WebDevJL\Framework\Core\FileManager\ArrayFilterFileSearch::InitWithoutApp()->RecursiveFileTreeScanOf(
        ROOT_DIR,
        WebDevJL\Framework\Core\FileManager\Algorithms\ArrayListAlgorithm::ExcludeList());
    var_dump($list);
    $output = "<ul>";
    foreach ($list as $item) {
        echo "<li>$item</li>";
    }
    $output .= "</ul>";
    
    echo $output;