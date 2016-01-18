<?php

/**
 * The base object to manipulate when generating a test suite.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package InitializeTestSuiteBaseObject
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

class InitializeTestSuiteBaseObject {
    const CLASS_NAME_TO_TEST = "{{class_name_to_test}}";
    const FULL_CLASS_NAME_TO_TEST = "{{full_class_name_to_test}}";
    const TEST_CLASS_NAME = "{{test_class_name}}";
    const TEST_CLASS_NAMESPACE = "{{test_class_namespace}}";
    const SOURCE_FOLDER_NAME = "src";
    const TESTS_FOLDER_NAME = "tests";
    const DIR_SEPARATOR = "/";
    const CLASS_CREATION_STATE = "test_class_state";
    const CLASS_CREATION_FINAL_PATH = "test_class_filepath";
    const TEST_SUITE_VERSION = "{{test_suite_version}}";

    private $SourceNamespacePrefix;
    private $TestNamespacePrefix;
    private $ExceptionFilters;
    public $output;
}
