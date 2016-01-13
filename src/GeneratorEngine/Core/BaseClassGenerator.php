<?php

/**
 * Class with the properties needs to generate a class file.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package BaseClassGenerator
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

use WebDevJL\Framework\Core\Application;
use WebDevJL\Framework\Core\Config;
use WebDevJL\Framework\Enums\AppSettingKeys;
use WebDevJL\Framework\GeneratorEngine\CodeSnippets\PhpCodeSnippets;
use WebDevJL\Framework\GeneratorEngine\Templates\TemplateFileNameConstants;

class BaseClassGenerator extends BaseTemplateProcessor implements IClassGenerator {

  /**
   * 
   * @param string $destinationDir
   * @param assoc array $params : the params composed the namespace and name of the class
   * @param array(of String) $data : list of controllers file names.
   */
  public function __construct(Application $app, $params, $data) {
    parent::__construct($app);
    $this->destinationDir = "APP_ROOT_DIR" . $params[BaseClassGenerator::DestinationDirKey];
    $this->placeholders = \WebDevJL\Framework\GeneratorEngine\Placeholders\PlaceholdersManager::InitPlaceholdersForPhpDoc($params);
    $this->data = $data;
    $templateHeader = TemplateFileNameConstants::GetFullNameForConst(TemplateFileNameConstants::ClassTemplate);
    $this->classTemplateContents = file_exists($templateHeader) ?
            file_get_contents($templateHeader) : FALSE;
  }

  /**
   * Cleans a file name from its extension and build the key string value to find
   * its value in the array of constants.
   * @param type $rawValue
   * @param type $valueToTrim
   * @return type
   */
  protected function CleanAndBuildConstantKeyValue($rawValue, $valueToTrim) {
    $valueCleaned = $this->RemoveExtensionFileName($rawValue, $valueToTrim);
    return $this->BuildConstantKeyValue($valueCleaned);
  }

  /**
   * Remove extension of filename.
   * 
   * @param string $filename
   * @param string $extension
   * @return string the extensionless filename
   */
  protected function RemoveExtensionFileName($filename, $extension) {
    //WARNING: the function trim does weird thing so prefer using str_replace
    //ex: if we have a filename "popupsomething.php" where we want the extension
    //to be removed, the trimmed result will be "opupsomething".
    return str_replace($extension, "", $filename);
  }

  public function BuildClass() {
    $this->OpenWriter();
    $this->WriteClassHeader();
    $this->WriteConstants();
    $this->WriteContent();
    $this->ClassEnd();
    $this->CloseWriter();
  }

  /**
   * Build a string for a constant representing the key in the
   * array of constants.
   * 
   * @param string $value The value that will make the constant name with self::Key suffix
   * @param string $valueToRemove The string to remove from $value.
   * @return string the computed value
   */
  public function BuildConstantKeyValue($value, $valueToRemove = "") {
    return str_replace($valueToRemove, "", $value);
  }


  /**
   * Closes the class.
   */
  public function ClassEnd() {
    fwrite($this->writer, PhpCodeSnippets::LF . "}");
  }

  /**
   * Closes handle of file opened.
   */
  public function CloseWriter() {
    fclose($this->writer);
  }

  /**
   * 
   * @param string $dynamicMethod the template method to build the final method
   * name from.
   * 
   * @return string the computed method name.
   */
  public function GetMethodNameToGenerate($dynamicMethod) {
    return str_replace(array("Write", "Method"), "", $dynamicMethod);
  }

  /**
   * Opens handle to write to target file.
   */
  public function OpenWriter() {
    $filePath = $this->destinationDir . $this->fileName;
    $this->writer = fopen($filePath, 'w') or die("can't open file $filePath.");
  }

  /**
   * Computes a value of an associative array.
   * 
   * @param string $value the value to use to compute the output
   * @param int $tabAmount the amount of tabulations to print in the computed output
   * @return string the computed string
   */
  public function WriteAssociativeArrayValue($value, $tabAmount = 0) {
    $lineOfCode = str_repeat("  ", $tabAmount) .
            "self::" .
            $value . self::Key . " => '" . $value . "'," .
            PhpCodeSnippets::LF;
    return $lineOfCode;
  }

  /**
   * Computes a value of an associative array.
   * 
   * @param string $value the value to use to compute the output
   * @return string the computed string
   */
  public function WriteAssociativeArrayValueAsNewArray($value, $tabAmount = 0) {
    $lineOfCode = str_repeat("  ", $tabAmount) .
            "self::" .
            $value . self::FolderSuffix . " => array(" .
            PhpCodeSnippets::LF;
    return $lineOfCode;
  }

  public function WriteAssociativeArrayValueWithKeyAndValue($key, $value, $tabAmount = 0) {
    throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
  }

  /**
   * Writes the class header:
   */
  public function WriteClassHeader() {
    $this->ProcessTemplate();
  }

  /**
   * Builds a line of code that declare a constant.
   * @param string $value
   * @return string a line of code representing a constant declaration
   */
  public function WriteConstant($value) {
    $constantName = strtoupper($value);
    $lineOfCode = PhpCodeSnippets::TAB2 .
            "const " . $constantName .
            " = '" .
            $value . "';" .
            PhpCodeSnippets::LF;
    return $lineOfCode;
  }

  public function WriteContent() {
    throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
  }

  public function WriteNewArrayAndItsContents($array, $arrayOpened = FALSE, $tabAmount = 0) {
    throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
  }

}
