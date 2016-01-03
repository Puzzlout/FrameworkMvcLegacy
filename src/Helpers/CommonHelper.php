<?php

/**
 *
 * @package		Easy MVC Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CommonHelper Class
 *
 * @package		Library
 * @category	Utility
 * @category	
 * @author		Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Helpers;

class CommonHelper {

  public static function StringToArray($delimiter, $string) {
    $arrayRaw = explode($delimiter, $string);
    $arrayCleaned = array();
    foreach ($arrayRaw as $value) {
      if (!empty($value))
        array_push($arrayCleaned, CommonHelper::CleanString($value));
    }
    return $arrayCleaned;
  }

  public static function CleanString($string) {
    return trim($string);
  }

  public static function SetDynamicPropertyNamesForDualList($module, $property_list) {
    $dynamicPropertyNames = array();
    foreach ($property_list as $key => $value) {
      $dynamicPropertyNames[\Applications\EasyMvc\Resources\Enums\ViewVariablesKeys::property_key . $key] = $module . "_" . $value;
    }
    return $dynamicPropertyNames;
  }

  public static function SetPropertyNamesForDualList($module) {
    return array(
        \Applications\EasyMvc\Resources\Enums\ViewVariablesKeys::property_id => $module . "_id",
        \Applications\EasyMvc\Resources\Enums\ViewVariablesKeys::property_name => $module . "_name",
        \Applications\EasyMvc\Resources\Enums\ViewVariablesKeys::property_active => $module . "_active",
    );
  }

  public static function GetShortClassName($object) {
    $full_class_name = get_class($object);
    $class_name = substr($full_class_name, strrpos($full_class_name, '\\') + 1);
    $class_name = str_replace("_extension", "", $class_name);
    return strtolower($class_name);
  }

  public static function GetFullClassName($object) {
    return get_class($object);
  }

  public static function GetListObjectsInSessionByKey($user, $key) {
    $objects = array();
    $projects = $user->getAttribute(\WebDevJL\Framework\Enums\SessionKeys::UserSessionProjects);
    if ($projects === NULL) {
      $projects = array();
    }
    foreach ($projects as $project) {
      array_push($objects, $project[$key]);
    }
    return $objects;
  }

  /**
   * Prepare an object Object before calling the DB.
   * 
   * @param array $data_sent from POST request
   * @param object $object_is an instance of Class found in Models/Dao
   * @return Object (possible types in Models/Dao)
   */
  public static function PrepareUserObject($data_sent, $object) {
    foreach ($data_sent as $key => $value) {
      $method = "set" . ucfirst($key);
      $object->$method(!array_key_exists($key, $data_sent) ? NULL : $value);
    }
    return $object;
  }

  /**
   * Find an object in a list filtering by the id value of  given property name of each object.
   * 
   * @param string $idValue
   * The id value used to compare with the property name given of each object of the list. 
   * @param string $propName
   * The property name to build the property getter function to perform a comparaison with the id value provided. 
   * @param array (of object) $listOfObjects
   * The list of objects of type T to look into. T is defined by the caller. 
   * @return mixed{boolean,object}
   * The object if found or FALSE otherwise. 
   */
  public static function FindObjectByIntValue($idValue, $propName, $listOfObjects) {
    $match = FALSE;
    foreach ($listOfObjects as $obj) {
      if (intval($obj->$propName()) === $idValue) {
        $match = $obj;
        break;
      }
    }
    return $match;
  }

  /**
   * Find an object in a list filtering by the string value of one property name of each object.
   * 
   * @param string $filter
   * The filter used to compare with the property name of each object of the list. 
   * @param string $propName
   * The property name to build the property getter function to perform a comparaison with the filter value provided. 
   * @param array (of object) $list_of_obj
   * The list of objects of type T to look into. 
   * @param string $key
   * The key to read the value in an associative array if the list of object
   * is a list of associative arrays.
   * @return mixed{boolean,object}
   * The object if found or FALSE otherwise. 
   */
  public static function FindObjectByStringValue($filter, $propName, $listOfObjects, $key = NULL) {
    $match = FALSE;
    if ($key === NULL) {
      foreach ($listOfObjects as $obj) {
        if ($obj->$propName() === $filter) {
          $match = $obj;
          break;
        }
      }
    } else {
      foreach ($listOfObjects as $obj) {
        if ($obj[$key]->$propName() === $filter) {
          $match = $obj[$key];
          break;
        }
      }
    }

    return $match;
  }

  public static function FindIndexInObjectListById($id, $prop_name, $sessionArray, $sessionKey) {
    $match = array();
    $list = $sessionArray[$sessionKey];
    foreach (array_keys($list) as $key) {
      if (intval($list[$key]->$prop_name()) === intval($id)) {
        $match["object"] = $list[$key];
        $match["key"] = $key;
        break;
      }
    }
    return $match;
  }

  public static function FindIndexInIdListById($valueToFind, $idList) {
    $match = NULL;
    foreach (array_keys($idList) as $index => $key) {
      if ($idList[$key] === $valueToFind) {
        $match = $index;
        break;
      }
    }
    return $match;
  }

  public static function FilterObjectsToExcludeRelatedObject($objects, $related_objects, $prop_id) {
    $matches = array();
    foreach ($objects as $object) {
      $to_add = TRUE;
      foreach ($related_objects as $related_object) {
        if (intval($object->$prop_id()) === intval($related_object->$prop_id())) {
          $to_add = FALSE;
          break;
        }
      }
      if ($to_add) {
        array_push($matches, $object);
      }
    }
    return $matches;
  }

  public static function SetActiveTab(\WebDevJL\Framework\Core\User $user, $tab_name, $sessionKey) {
    $tabs = $user->getAttribute($sessionKey);
    foreach ($tabs as $key => $value) {
      $tabs[$key] = "";
    }
    $tabs[$tab_name] = "active";
    $user->setAttribute($sessionKey, $tabs);
  }

  //TODO: replace with GetValueInSession
  public static function GetTabsStatus(\WebDevJL\Framework\Core\User $user, $sessionKey) {
    return $user->getAttribute($sessionKey);
  }

  public static function SetValueInSession($user, $sessionKey, $value) {
    $user->setAttribute($sessionKey, $value);
  }

  public static function GetValueInSession($user, $sessionKey) {
    return $user->getAttribute($sessionKey);
  }

  public static function GetObjectListFromSessionArrayBySessionKey($sessionArray, $sessionKey) {
    $list = array();
    foreach ($sessionArray as $array) {
      array_push($list, $array[$sessionKey]);
    }
    return $list;
  }

  public static function GetValueFromArrayByKey($array, $key) {
    return $array[$key];
  }

  public static function GetPropValueFromObjectByPropName($object, $propName, $isArray = TRUE) {
    return
            $isArray ?
            $object[$propName] :
            $object->$propName();
  }

  /**
   * Returns the truncated text based on the passed
   * parameters, at present the method generates the
   * HTML markup as well which is needed for the tooltip
   * to work properly.
   */
  public static function generateEllipsisAndTooltipMarkupFor($textToTruncate, $charLimit, $placement) {
    $truncatedData = null;
    if (strlen($textToTruncate) > intval($charLimit)) {
      //We would have to truncate
      $truncatedData = array(
          'source' => $textToTruncate,
          'truncated' => substr($textToTruncate, 0, $charLimit - 3) . '...'
      );
    } else {
      //Return the string as it is
      $truncatedData = array(
          'source' => $textToTruncate,
          'truncated' => ''
      );
    }

    if (trim($truncatedData['truncated']) !== '') {
      echo $truncatedData['truncated'];
      echo '<input type="hidden" class="ellipsis-tooltip" value="' . $truncatedData['source'] . '" placement="' . $placement . '" >';
    } else {
      echo $truncatedData['source'];
    }
  }

  public static function EncryptDataHelper($data) {
    $security = new \WebDevJL\Framework\Security\Protect ();
    return $security->Encrypt($data);
  }

  /**
   * Return the app name based on the context (Running or Testing).
   * @return string
   */
  public static function GetAppName() {
    return
            defined("__TESTED_APPNAME__") ?
            __TESTED_APPNAME__ :
            FrameworkConstants_AppName;
  }

  /**
   * Get the xml reader instance for an xml file. If $filePath is given, we
   * assign to $fileName the filename from $filePath to use it when storing the
   * XmlReader instance in session.
   * @param string $filePath
   * @param string $fileName
   */
  public static function GetXmlReaderInstanceForSourceFile($filePath, $fileName = NULL) {
    if (!isset($fileName)) {
      $fileName = substr($filePath, strrpos($filePath, "/") + 1);
    }
    $xmlFilesLoaded = apc_fetch(\WebDevJL\Framework\Enums\CacheKeys::XmlFilesLoaded);
    if (array_key_exists($fileName, $xmlFilesLoaded)) {
      $this->xmlReader = $xmlFilesLoaded[$fileName];
    } else {
      $this->xmlReader = isset($fileName) ?
              new \WebDevJL\Framework\Core\XmlReader(NULL, $configFileName) :
              new \WebDevJL\Framework\Core\XmlReader($filePath);
      $xmlFilesLoaded[$configFileName] = $this->xmlReader;
      apc_add(\WebDevJL\Framework\Enums\CacheKeys::XmlFilesLoaded, $xmlFilesLoaded);
    }
  }

  /**
   * Clean an associative array when its key have a prefix, like "*" which happens
   * when converting an object to associative array.
   * 
   * @param array $array the array to clean
   * @param string $prefix the prefix to remove
   * @return associative array
   */
  public static function CleanPrefixedkeyInAssocArray($array, $prefix = "\0*\0") {
    $cleanedArray = array("array");
    foreach ($array as $key => $value) {
      $keyCleaned = str_replace($prefix, "", $key);
      $cleanedArray["array"][$keyCleaned] = $value;
    }
    return $cleanedArray["array"];
  }

  /**
   * 
   * @param array $arrayToSearch
   * @param string $assocArrayKeyValue
   * @param string $assocArrayValue
   * @return array
   */
  public static function FindArrayFromAContainingValue($arrayToSearch, $assocArrayKeyValue, $assocArrayValue) {
    foreach ($arrayToSearch as $subArray) {
      if (array_key_exists($assocArrayKeyValue, $subArray) &&
              $subArray[$assocArrayKeyValue] === (string)$assocArrayValue) {
        return $subArray;
      }
    }
    return array();
  }

}
