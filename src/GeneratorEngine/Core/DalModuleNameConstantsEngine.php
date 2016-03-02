<?php

/**
 * Class to retrieve the dal module files and build a class that holds an array 
 * of dal modules constant names.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package DalModuleNameConstantsGenerator
 */

namespace Puzzlout\Framework\GeneratorEngine\Core;

use Puzzlout\Framework\Core\DirectoryManager;

class DalModuleNameConstantsEngine extends ConstantsClassEngineBase {

    /**
     * Retrieve the lists of filenames.
     * Generate the Classes that list the Dal Modules names available in the
     * solution.
     * 
     * @param assoc array $data depending on the situation, some data can be passed
     * on to generate the files desired.
     */
    public function Run($data = null) {
        $FrameworkDalModules = DirectoryManager::GetFileNames(
                        "APP_ROOT_DIR" . \Puzzlout\Framework\Enums\FrameworkFolderName::DalModulesFolderName);

        $ApplicationDalModules = DirectoryManager::GetFileNames(
                        "APP_ROOT_DIR" .
                        \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName .
                        "APP_NAME" .
                        \Puzzlout\Framework\Enums\ApplicationFolderName::DalModulesFolderName);


        $this->InitGenerateFrameworkFile($FrameworkDalModules);
        $this->InitGenerateApplicationFile($ApplicationDalModules);
    }

    function InitGenerateFrameworkFile($FrameworkControllers) {
        $this->params = array(
            BaseClassGenerator::NameSpaceKey => "Puzzlout\Framework\Generated",
            BaseClassGenerator::ClassNameKey => "Framework" . $this->GeneratedClassPrefix,
            BaseClassGenerator::DestinationDirKey => \Puzzlout\Framework\Enums\FrameworkFolderName::GeneratedFolderName,
            BaseClassGenerator::ClassDescriptionKey => "Lists the constants for framework dal module classes for autocompletion and easy coding.",
            ConstantsClassGeneratorBase::DoGenerateConstantKeysKey => true,
            ConstantsClassGeneratorBase::DoGenerateGetListMethodKey => true
        );
        $this->GenerateFrameworkFile($FrameworkControllers);
    }

    function InitGenerateApplicationFile($ApplicationControllers) {
        $this->params = array(
            BaseClassGenerator::NameSpaceKey => "Applications\\" . "APP_NAME" . "\Generated",
            BaseClassGenerator::ClassNameKey => "APP_NAME" . $this->GeneratedClassPrefix,
            BaseClassGenerator::DestinationDirKey => \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName .
            "APP_NAME" . \Puzzlout\Framework\Enums\ApplicationFolderName::Generated,
            BaseClassGenerator::ClassDescriptionKey => "Lists the constants for application dal module classes for autocompletion and easy coding.",
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
