<?php

/**
 * Base class for handling the common resources.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package CommonResxBase
 */

namespace WebDevJL\Framework\Core\ResourceManagers;

class CommonResxBase extends ResourceBase implements \WebDevJL\Framework\Interfaces\IResource {

  /**
   * Method that retrieve the array of resources.
   * @return array the array of ressources
   */
  public function GetList() {
    $namespacePrefix = 
      "\\Applications\\" .
      \WebDevJL\Framework\FrameworkConstants::APP_NAME .
      "\\Resources\\Common\\";
    $resourceNamespace = $this->GetResourceNamespace($namespacePrefix, $this->GroupValue);
    $resourceFile = new $resourceNamespace();
    return $resourceFile->GetList();
  }

  /**
   * Get the resource value by group and key.
   * 
   * @param string $key the resource key to find
   * @return string the resource value
   */
  public function GetValue($key) {
    $resources = $this->GetList();
    $keyExist = array_key_exists($key, $resources);
    if ($keyExist) {
      return $resources[$key][\WebDevJL\Framework\BO\F_common_resource::F_COMMON_RESOURCE_VALUE];
    } else {
//      throw new \WebDevJL\Framework\Exceptions\ResourceNotFoundException(
//      "The resource value doesn't exist for Group => " . $this->GroupValue . " and Key => " . $key, 0, NULL);
      return "???";
    }
  }

  /**
   * Get the resource comment by group and key.
   * 
   * @param string $key the resource key to find
   * @return string the resource comment
   */
  public function GetComment($key) {
    $resources = $this->GetList();
    $keyExist = array_key_exists($key, $resources);
    if ($keyExist) {
      return $resources[$key][\WebDevJL\Framework\BO\F_common_resource::F_COMMON_RESOURCE_COMMENT];
    } else {
//      throw new \WebDevJL\Framework\Exceptions\ResourceNotFoundException(
//      "The resource comment doesn't exist for Group => " . $this->GroupValue . " and Key => " . $key, 0, NULL);
      return "???";
    }
  }

}
