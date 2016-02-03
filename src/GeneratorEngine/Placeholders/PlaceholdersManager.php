<?php

/**
 * Manages the placeholders arrays.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package 
 */

namespace Puzzlout\Framework\GeneratorEngine\Placeholders;

use Puzzlout\Framework\GeneratorEngine\Core\BaseClassGenerator;

class PlaceholdersManager {

    public static function InitPlaceholdersForPhpDoc($params) {
        return array(
            PhpDocPlaceholders::AUTHOR => "Jeremie Litzler",
            PhpDocPlaceholders::COPYRIGHT_YEAR => date("Y"),
            PhpDocPlaceholders::LICENCE => "http://opensource.org/licenses/gpl-license.php GNU Public License",
            PhpDocPlaceholders::LINK => "https://github.com/Puzzlout/EasyMvc/blob/master/README.md",
            PhpDocPlaceholders::PACKAGE => (array_key_exists(BaseClassGenerator::ClassNameKey, $params) ? $params[BaseClassGenerator::ClassNameKey] : ""),
            PhpDocPlaceholders::SUBPACKAGE => "",
            PhpDocPlaceholders::VERSION_NUMBER => "PACKAGE_VERSION",
            ClassFilePlaceholders::NAMESPACE_FRAMEWORK => (array_key_exists(BaseClassGenerator::NameSpaceKey, $params) ? $params[BaseClassGenerator::NameSpaceKey] : ""),
            ClassFilePlaceholders::NAMESPACE_APP => "",
            ClassFilePlaceholders::NAMESPACE_CLASS => (array_key_exists(BaseClassGenerator::NameSpaceKey, $params) ? $params[BaseClassGenerator::NameSpaceKey] : ""),
            ClassFilePlaceholders::CLASS_NAME => (array_key_exists(BaseClassGenerator::ClassNameKey, $params) ? $params[BaseClassGenerator::ClassNameKey] : ""),
            ClassFilePlaceholders::CLASS_DESCRIPTION => (array_key_exists(BaseClassGenerator::ClassDescriptionKey, $params) ? $params[BaseClassGenerator::ClassDescriptionKey] : "")
        );
    }

}
