<?php

/**
 * Base class for handling the controller resources.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ControllerResxBase
 */

namespace Puzzlout\Framework\Core\ResourceManagers;

use Puzzlout\Framework\BO\F_controller_resource;
use Puzzlout\Exceptions\Codes\ResourceErrors;
use Puzzlout\Exceptions\Classes;

class ControllerResxBase extends ResourceBase implements \Puzzlout\Framework\Interfaces\IResource {

    /**
     * Method that retrieve the array of resources.
     * 
     * @return array the array of ressources
     */
    public function GetList() {
        $namespacePrefix = "\\Applications\\" .
                "APP_NAME" .
                "\\Resources\\Controller\\";
        $resourceNamespace = $this->GetResourceNamespace($namespacePrefix, $this->ModuleValue);
        $resourceFile = new $resourceNamespace();
        return $resourceFile->GetList();
    }

    /**
     * Get the resource by module, action and key.
     * 
     * @param string $key the resource key to find
     * @return string the resource value
     * @todo activate the exception?
     */
    public function GetValue($key) {
        $resources = $this->GetList();
        $actionLower = strtolower($this->ActionValue);
        $keyLower = strtolower($key);
        $actionExists = array_key_exists($actionLower, $resources);
        $keyExist = $actionExists ?
                array_key_exists($keyLower, $resources[$actionLower]) :
                false;
        if ($keyExist) {
            return $resources[$actionLower][$keyLower][F_controller_resource::F_CONTROLLER_RESOURCE_VALUE];
        } else {
//            $errMsg = 
//                    "The resource value doesn't exist. Module => " . 
//                    $this->ModuleValue . 
//                    " ; Action => " . 
//                    $this->ActionValue .
//                    "; Key => " . $key;
//            throw new Classes\ResourceNotFoundException($errMsg, ResourceErrors::RESOURCE_VALUE_NOT_FOUND, null);
            return "???";
        }
    }

    /**
     * Get the resource comment by module, action and key.
     * 
     * @param string $key the resource key to find
     * @return string the resource comment
     * @todo activate the exception?
     */
    public function GetComment($key) {
        $resources = $this->GetList();
        $actionExists = array_key_exists($this->ActionValue, $resources);
        $keyExist = $actionExists ?
                array_key_exists($key, $resources[$this->ActionValue]) :
                false;
        if ($keyExist) {
            return $resources[$this->ActionValue][$key][F_controller_resource::F_CONTROLLER_RESOURCE_COMMENT];
        } else {
//            $errMsg = 
//                    "The resource comment doesn't exist. Module => " . 
//                    $this->ModuleValue . 
//                    " ; Action => " . 
//                    $this->ActionValue .
//                    "; Key => " . $key;
//            throw new Classes\ResourceNotFoundException($errMsg, ResourceErrors::RESOURCE_COMMENT_NOT_FOUND, null);
            return "???";
        }
    }

}
