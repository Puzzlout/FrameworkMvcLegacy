<?php

include_once("vendor/autoload.php");
define(ROOT_DIR, dirname(dirname(__FILE__)) . "/FrameworkMvc/");
define(VENDOR, "WebDevJL");

echo "<h1>Starting...</h1>";
WebDevJL\Framework\GeneratorEngine\Core\InitializeTests::Init()->ProcessSourceFolder();
echo "<h1>Finished!</h1>\n";
