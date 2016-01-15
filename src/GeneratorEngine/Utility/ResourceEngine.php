<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ResourceHelper
 */

namespace WebDevJL\Framework\GeneratorEngine\Utility;

class ResourceEngine extends \WebDevJL\Framework\GeneratorEngine\Core\ResourceConstantsClassEngine {

    const CommonClassDerivationNamespace = "\WebDevJL\Framework\Core\ResourceManagers\CommonResxBase";
    const ControllerClassDerivationNamespace = "\WebDevJL\Framework\Core\ResourceManagers\ControllerResxBase";

    public $NamespaceApplicationRootGeneratedFolder = "";
    public $DestinationFolder = "";
    protected $app;

    public function setAppInstance($app) {
        $this->app = $app;
    }

    public function Run($data = NULL) {
        $this->PrepareTheDefaultParametersForGeneration(); //todo: put method in Interface.
        $this->GenerateCommonResxFiles($data[\WebDevJL\Framework\Core\Globalization::COMMON_RESX_ARRAY_KEY]);
        $this->GenerateControllerResxFiles($data[\WebDevJL\Framework\Core\Globalization::CONTROLLER_RESX_ARRAY_KEY]);
    }

    /**
     * Initialize the property $params with a array key so that we can set value on case per case basis.
     */
    public function PrepareTheDefaultParametersForGeneration() {
        $this->params = array(
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::DestinationDirKey => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::CultureKey => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation => NULL,
            \WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey => TRUE,
            \WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey => TRUE,
        );
    }

    /**
     * Update the $params based the current context.
     * 
     * @param string $key the resource identification being generated.
     * @param associative array $culture the object F_culture transformed into an array
     */
    public function UpdateTheParametersForGeneration($key, $culture) {
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey] = $this->NamespaceApplicationRootGeneratedFolder;
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey] = ucfirst($key) . $this->GeneratedClassPrefix;
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::DestinationDirKey] = $this->DestinationFolder;
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::CultureKey] = is_null($culture) ?
                NULL :
                $culture[\WebDevJL\Framework\BO\F_culture::F_CULTURE_LANGUAGE] . "_" . $culture[\WebDevJL\Framework\BO\F_culture::F_CULTURE_REGION];
        if ($this->IsGeneratingBaseClass) {
            $this->params[\WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey] = TRUE;
            $this->params[\WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey] = FALSE;
        } else {
            $this->params[\WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateConstantKeysKey] = FALSE;
            $this->params[\WebDevJL\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase::DoGenerateGetListMethodKey] = TRUE;
        }
    }

    private function GenerateCommonResxFiles($resources) {
        $this->NamespaceApplicationRootGeneratedFolder = "Applications\\" . "APP_NAME" . "\Resources\\Common";
        $this->DestinationFolder = \WebDevJL\Framework\Enums\ApplicationFolderName::AppsFolderName . "APP_NAME" . \WebDevJL\Framework\Enums\ApplicationFolderName::ResourceCommonFolderName;
        foreach ($resources as $groupKey => $groupArray) {
            $this->IsGeneratingBaseClass = TRUE;
            foreach ($groupArray as $cultureKey => $cultureArray) {
                //We need to generate the GroupBase resource file that will hold only the key to query the resources.
                if ($this->IsGeneratingBaseClass) {
                    $baseClassNamespace = $this->GenerateCommonBaseClass($groupKey, $cultureArray);
                    $this->IsGeneratingBaseClass = FALSE;
                }
                //Then we generate the Group_xx_XX resource file that will list the resources using the base class constant keys.
                $culture = \WebDevJL\Framework\Helpers\CommonHelper::FindArrayFromAContainingValue($this->app->cultures, \WebDevJL\Framework\BO\F_culture::F_CULTURE_ID, (string) $cultureKey);
                $this->UpdateTheParametersForGeneration($groupKey, $culture);
                $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey] = "List of the resources values for the group " . $groupKey;
                $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = $baseClassNamespace;
                $this->GenerateApplicationFile($cultureArray);
            }
        }
    }

    private function GenerateControllerResxFiles($resources) {
        $this->NamespaceApplicationRootGeneratedFolder = "Applications\\" . "APP_NAME" . "\Resources\\Controller";
        $this->DestinationFolder = \WebDevJL\Framework\Enums\ApplicationFolderName::AppsFolderName . "APP_NAME" . \WebDevJL\Framework\Enums\ApplicationFolderName::ResourceControllerFolderName;
        foreach ($resources as $moduleKey => $moduleArray) {
            $this->IsGeneratingBaseClass = TRUE;
            foreach ($moduleArray as $cultureKey => $cultureArray) {
                if ($this->IsGeneratingBaseClass) {
                    $baseClassNamespace = $this->GenerateControllerBaseClass($moduleKey, $cultureArray);
                    $this->IsGeneratingBaseClass = FALSE;
                }
                $culture = \WebDevJL\Framework\Helpers\CommonHelper::FindArrayFromAContainingValue($this->app->cultures, \WebDevJL\Framework\BO\F_culture::F_CULTURE_ID, (string) $cultureKey);
                $this->UpdateTheParametersForGeneration($moduleKey, $culture);
                $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey] = "List of the resources values for the module " . $moduleKey;
                $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = $baseClassNamespace;
                $this->GenerateApplicationFile($cultureArray);
            }
        }
    }

    private function GenerateCommonBaseClass($groupKey, $cultureArray) {
        $this->UpdateTheParametersForGeneration($groupKey, NULL);
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = NULL; //self::CommonClassDerivationNamespace;
        return $this->GenerateApplicationFile($cultureArray);
    }

    private function GenerateControllerBaseClass($moduleKey, $cultureArray) {
        $this->UpdateTheParametersForGeneration($moduleKey, NULL);
        $this->params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDerivation] = NULL; //self::ControllerClassDerivationNamespace;
        return $this->GenerateApplicationFile($cultureArray);
    }

}
