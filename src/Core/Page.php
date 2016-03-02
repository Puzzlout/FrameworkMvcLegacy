<?php

/**
 * Page handles the generation of the html output to send back to the client.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package Page
 */

namespace Puzzlout\Framework\Core;

use Puzzlout\Exceptions\Codes;

class Page extends ApplicationComponent {

    /**
     * The view filepath to load in the request.
     * 
     * @var string 
     */
    protected $contentFile;

    /**
     * The list of variables to declare before generating the output.
     * 
     * @var array
     */
    protected $variablesList = array();

    /**
     * Adds a key/value pair variable to the list of data variable that will be
     * used to generate the html output.
     * 
     * @param string $key The key represents the variable name to access the value
     * from the Views and Partial Views.
     * @param mixed $value The value that will be used to generate the html output.
     * It can be a bool, a int, a string, an array, a list of objects.
     * @throws \InvalidArgumentException Throws if the $key paramater is not valid
     * (not a string or empty or null).
     */
    public function addVar($key, $value) {
        if (!is_string($key)) {
            $errMsg = 'Key name must be a string or be not null';
            throw new \InvalidArgumentException($errMsg, Codes\GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE, null);
        } elseif (empty($key)) {
            $errMsg = 'Key name must not be empty';
            throw new \InvalidArgumentException($errMsg, Codes\GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE, null);
        } elseif (is_null($key)) {
            $errMsg = 'Key name must not be null';
            throw new \InvalidArgumentException($errMsg, Codes\GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE, null);
        }
        $this->variablesList[$key] = $value;
    }

    /**
     * Computes the html output of send to the client. It extracts the variables
     * first, 
     * 
     * @return string The output generated.
     * @throws \Exception Throws if the number of variables extracted if different
     * to the number of variables given to extract.
     */
    public function GetOutput() {
        $numberOfVarsExtracted = extract($this->variablesList);
        if (count($this->variablesList) !== $numberOfVarsExtracted) {
            $errMsg = "Number of variables extracted different from the $vars array";
            throw new \Exception($errMsg, Codes\LogicErrors::UNEXPECTED_VALUE, null);
        }
        ob_start();
        include_once $this->contentFile;
        $content = ob_get_clean();
        ob_start();
        include_once "APP_ROOT_DIR" . \Puzzlout\Framework\Enums\FrameworkFolderName::ViewsFolderName . \Puzzlout\Framework\Enums\FileNameConst::LayoutTemplate;
        return ob_get_clean();
    }

    /**
     * Sets the $contentFile to the view path.
     * 
     * @param string $contentFile Path to view to load.
     */
    public function setContentFile($contentFile) {
        $this->contentFile = $contentFile;
    }

}
