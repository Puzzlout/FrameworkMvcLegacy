<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ResourceHelper
 */

namespace Puzzlout\Framework\GeneratorEngine\Utility;

class ResourceEngine extends \Puzzlout\Framework\GeneratorEngine\Core\ResourceConstantsClassEngine {

    const CommonClassDerivationNamespace = "\Puzzlout\Framework\Core\ResourceManagers\CommonResxBase";
    const ControllerClassDerivationNamespace = "\Puzzlout\Framework\Core\ResourceManagers\ControllerResxBase";

    public $NamespaceApplicationRootGeneratedFolder = "";
    public $DestinationFolder = "";
    protected $app;

    public function setAppInstance($app) {
        $this->app = $app;
    }

    public function Run($data = null) {
        $this->PrepareTheDefaultParametersForGeneration(); //todo: put method in Interface.
        $this->GenerateCommonResxFiles($data[\Puzzlout\Framework\Core\Globalization::COMMON_RESX_ARRAY_KEY]);
        $this->GenerateControllerResxFiles($data[\Puzzlout\Framework\Core\Globalization::CONTROLLER_RESX_ARRAY_KEY]);
    }

    /**
     * Initialize the property $params with a array key so that we can set value on case per case basis.
     */
    public function PrepareTheDefaultParametersForGeneration() {
        $this->params = array(
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey => null,
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey => null,
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::DestinationDirKey => null,
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey => null,
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::CultureKey => null,
            \Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation => null,
            \Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey => true,
            \Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey => true,
        );
    }

    /**
     * Update the $params based the current context.
     * 
     * @param string $key the resource identification being generated.
     * @param associative array $culture the object F_culture transformed into an array
     */
    public function UpdateTheParametersForGeneration($key, $culture) {
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey] = $this->NamespaceApplicationRootGeneratedFolder;
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey] = ucfirst($key) . $this->GeneratedClassPrefix;
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::DestinationDirKey] = $this->DestinationFolder;
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::CultureKey] = is_null($culture) ?
                null :
                $culture[\Puzzlout\Framework\BO\F_culture::F_CULTURE_LANGUAGE] . "_" . $culture[\Puzzlout\Framework\BO\F_culture::F_CULTURE_REGION];
        if ($this->IsGeneratingBaseClass) {
            $this->params[\Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey] = true;
            $this->params[\Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey] = false;
        } else {
            $this->params[\Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey] = false;
            $this->params[\Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey] = true;
        }
    }

    private function GenerateCommonResxFiles($resources) {
        $this->NamespaceApplicationRootGeneratedFolder = "Applications\\" . "APP_NAME" . "\Resources\\Common";
        $this->DestinationFolder = \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName . "APP_NAME" . \Puzzlout\Framework\Enums\ApplicationFolderName::ResourceCommonFolderName;
        foreach ($resources as $groupKey => $groupArray) {
            $this->IsGeneratingBaseClass = true;
            foreach ($groupArray as $cultureKey => $cultureArray) {
                //We need to generate the GroupBase resource file that will hold only the key to query the resources.
                if ($this->IsGeneratingBaseClass) {
                    $baseClassNamespace = $this->GenerateCommonBaseClass($groupKey, $cultureArray);
                    $this->IsGeneratingBaseClass = false;
                }
                //Then we generate the Group_xx_XX resource file that will list the resources using the base class constant keys.
                $culture = \Puzzlout\Framework\Helpers\CommonHelper::FindArrayFromAContainingValue($this->app->cultures, \Puzzlout\Framework\BO\F_culture::F_CULTURE_ID, (string) $cultureKey);
                $this->UpdateTheParametersForGeneration($groupKey, $culture);
                $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey] = "List of the resources values for the group " . $groupKey;
                $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = $baseClassNamespace;
                $this->GenerateApplicationFile($cultureArray);
            }
        }
    }

    private function GenerateControllerResxFiles($resources) {
        $this->NamespaceApplicationRootGeneratedFolder = "Applications\\" . "APP_NAME" . "\Resources\\Controller";
        $this->DestinationFolder = \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName . "APP_NAME" . \Puzzlout\Framework\Enums\ApplicationFolderName::ResourceControllerFolderName;
        foreach ($resources as $moduleKey => $moduleArray) {
            $this->IsGeneratingBaseClass = true;
            foreach ($moduleArray as $cultureKey => $cultureArray) {
                if ($this->IsGeneratingBaseClass) {
                    $baseClassNamespace = $this->GenerateControllerBaseClass($moduleKey, $cultureArray);
                    $this->IsGeneratingBaseClass = false;
                }
                $culture = \Puzzlout\Framework\Helpers\CommonHelper::FindArrayFromAContainingValue($this->app->cultures, \Puzzlout\Framework\BO\F_culture::F_CULTURE_ID, (string) $cultureKey);
                $this->UpdateTheParametersForGeneration($moduleKey, $culture);
                $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey] = "List of the resources values for the module " . $moduleKey;
                $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = $baseClassNamespace;
                $this->GenerateApplicationFile($cultureArray);
            }
        }
    }

    private function GenerateCommonBaseClass($groupKey, $cultureArray) {
        $this->UpdateTheParametersForGeneration($groupKey, null);
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = null; //self::CommonClassDerivationNamespace;
        return $this->GenerateApplicationFile($cultureArray);
    }

    private function GenerateControllerBaseClass($moduleKey, $cultureArray) {
        $this->UpdateTheParametersForGeneration($moduleKey, null);
        $this->params[\Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = null; //self::ControllerClassDerivationNamespace;
        return $this->GenerateApplicationFile($cultureArray);
    }

}
