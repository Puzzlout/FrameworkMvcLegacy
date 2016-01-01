<?php
include_once("vendor/autoload.php");
define("ROOT_DIR", dirname(dirname(__FILE__)) . "/FrameworkMvc/");
define("VENDOR", "WebDevJL");
define("TESTING_FILE_TREE", true);
define("SKIP_TEST_CLASSES_GENERATION", true);

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
      .dir-exists {
        font-weight: bold;
        background-color: #EECE32;
        color: #000;
      }
      .dir-not-created, .test-class-not-created {
        font-weight: bold;
        background-color: #CB554A;
        color: #FFF;
      }
      .dir-created, .test-class-created {
        font-weight: bold;
        background-color: #8CC75A;
        color: #FFF;
      }
      .test-class-created,.test-class-not-created {
        margin-left: 1em;
        text-indent: 1em;
      }
    </style>
  </head>

  <body>
    <?php echo $TestSuite->output; ?>
  </body>

</html>