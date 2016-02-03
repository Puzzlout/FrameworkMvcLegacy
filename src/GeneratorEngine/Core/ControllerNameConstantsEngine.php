<?php

/**
 * Class to retrieve the controller files and build a class that holds an array 
 * of controller names.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ControllerListsGenerator
 */

namespace Puzzlout\Framework\GeneratorEngine\Core;

use Puzzlout\Framework\Core\DirectoryManager;

class ControllerNameConstantsEngine extends ConstantsClassEngineBase {

    /**
     * Retrieve the lists of controller filenames.
     * Generate the Classes that list the Controller names available in the
     * solution.
     * 
     * @param assoc array $data depending on the situation, some data can be passed
     * on to generate the files desired.
     */
    public function Run($data = NULL) {
        $this->ProcessFrameworkData();

        $ApplicationList = \Puzzlout\Framework\GeneratorEngine\Constants\ApplicationList::Init()->GetList();
        foreach ($ApplicationList as $Appname) {
            $this->ProcessApplicationData($Appname);
        }
    }

    private function ProcessFrameworkData() {
        $FrameworkControllers = DirectoryManager::GetFileNames(
                        "APP_ROOT_DIR" . \Puzzlout\Framework\Enums\FrameworkFolderName::ControllersFolderName, array("BaseController.php"));

        $this->params = array(
            BaseClassGenerator::NameSpaceKey => "Puzzlout\Framework\Generated",
            BaseClassGenerator::ClassNameKey => "Framework" . $this->GeneratedClassPrefix,
            BaseClassGenerator::DestinationDirKey => \Puzzlout\Framework\Enums\FrameworkFolderName::GeneratedFolderName,
            BaseClassGenerator::ClassDescriptionKey => "Lists the constants for framework controller classes to autocompletion and easy coding.",
            ConstantsClassGeneratorBase::DoGenerateConstantKeysKey => true,
            ConstantsClassGeneratorBase::DoGenerateGetListMethodKey => true
        );
        $this->GenerateFrameworkFile($FrameworkControllers);
    }

    /**
     * Generate the files for an app.
     * 
     * @param string $Appname
     */
    function ProcessApplicationData($Appname) {
        $ApplicationControllers = DirectoryManager::GetFileNames(
                        "APP_ROOT_DIR" .
                        \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName .
                        $Appname .
                        \Puzzlout\Framework\Enums\ApplicationFolderName::ControllersFolderName);

        $this->params = array(
            BaseClassGenerator::NameSpaceKey => "Applications\\" . $Appname . "\Generated",
            BaseClassGenerator::ClassNameKey => $Appname . $this->GeneratedClassPrefix,
            BaseClassGenerator::DestinationDirKey => \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName .
            $Appname . \Puzzlout\Framework\Enums\ApplicationFolderName::Generated,
            BaseClassGenerator::ClassDescriptionKey => "Lists the constants for application controller classes to autocompletion and easy coding.",
            ConstantsClassGeneratorBase::DoGenerateConstantKeysKey => true,
            ConstantsClassGeneratorBase::DoGenerateGetListMethodKey => true
        );
        $this->GenerateApplicationFile($ApplicationControllers);
    }

    /**
     * Generate the Constant Class.
     * 
     * @param array(of String) $data the array of data that will be used to build the list of constants
     */
    protected function GenerateConstantsClass($data) {
        if (count($data) > 0) {
            $classGen = new ConstantsAndListClassGenerator($this->params, $data);
            $classGen->BuildClass();
            return str_replace(".php", "", $classGen->fileName);
        } else {
            return "No class to generate.";
        }
    }

}
