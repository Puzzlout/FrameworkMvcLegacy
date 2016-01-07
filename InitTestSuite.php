<?php
include_once("vendor/autoload.php");
define("ROOT_DIR", dirname(dirname(__FILE__)) . "/FrameworkMvc/");
define("VENDOR", "WebDevJL");
define("TESTING_FILE_TREE", FALSE);
define("SKIP_TEST_CLASSES_GENERATION", FALSE);
define("OVERWRITE_TEST_SUITE", TRUE);
define("TEST_SUITE_VERSION", "v1.0.0");
/*
 * Load the framework constants
 */
require_once 'src/FrameworkConstants.php';
use WebDevJL\Framework\FrameworkConstants;
FrameworkConstants::SetNamedConstants(array(
    FrameworkConstants::FrameworkConstants_Name_TestAppName => NULL
));

echo "<h1>Starting...</h1>";
$TestSuite = WebDevJL\Framework\GeneratorEngine\Core\InitializeTestSuite::Init()->ProcessSourceFolder();
echo "<h1>Finished!</h1>\n";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Test Suite Generation</title>
    <style>
      * {
        margin: 0 !important;
      }
      p{
        padding: 10px 5px;
      }
      .exists {
        font-weight: bold;
        background-color: #EECE32;
        color: #000;
      }
      .not-created {
        font-weight: bold;
        background-color: #CB554A;
        color: #FFF;
      }
      .created {
        font-weight: bold;
        background-color: #8CC75A;
        color: #FFF;
      }
      .skipped {
        background-color: #FFC31E;
        color: #1F5AFF;
      }
      .test-class {
        margin-left: 1em;
        text-indent: 1em;
      }
    </style>
  </head>

  <body>
    <?php echo $TestSuite->output; ?>
  </body>

</html>
