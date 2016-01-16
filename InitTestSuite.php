<?php
/**
 * You must change the following values according to your case.
 */
define("VENDOR", "WebDevJL");
define("PACKAGE", "FrameworkMvc");
$soureNamespacePrefix = VENDOR . "\\Framework\\";
$testNamespacePrefix = VENDOR . "\\Framework\\Tests";

/**
 * NO MODIFICATION ZONE (except if you take responsibility of your actions)
 */
define("ROOT_DIR", dirname(dirname(__FILE__)) . "/" . PACKAGE . "/");
define("TESTING_FILE_TREE", FALSE);
define("SKIP_TEST_CLASSES_GENERATION", FALSE);
define("OVERWRITE_TEST_SUITE", TRUE);
define("TEST_SUITE_VERSION", "v1.1.0");

include_once("vendor/autoload.php");
use WebDevJL\Framework\GeneratorEngine\Core\InitializeTestSuite;

$TestSuite = InitializeTestSuite::Init($soureNamespacePrefix, $testNamespacePrefix)->ProcessSourceFolder();
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
    <h1>Starting generation of testing suite (<?php echo TEST_SUITE_VERSION; ?>)...</h1>
    <?php echo $TestSuite->output; ?>
    <h1>End of generation.</h1>
  </body>
</html>
