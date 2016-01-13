<?php

/**
 * Manages the placeholders arrays.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package 
 */

namespace WebDevJL\Framework\GeneratorEngine\Placeholders;

class PlaceholdersManager {

  public static function InitPlaceholdersForPhpDoc($params) {
    return array(
        PhpDocPlaceholders::AUTHOR => "Jeremie Litzler",
        PhpDocPlaceholders::COPYRIGHT_YEAR => date("Y"),
        PhpDocPlaceholders::LICENCE => "http://opensource.org/licenses/gpl-license.php GNU Public License",
        PhpDocPlaceholders::LINK => "https://github.com/WebDevJL/EasyMvc/blob/master/README.md",
        PhpDocPlaceholders::PACKAGE => $params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey],
        PhpDocPlaceholders::SUBPACKAGE => "",
        PhpDocPlaceholders::VERSION_NUMBER => FrameworkConstants_Version,
        ClassFilePlaceholders::NAMESPACE_FRAMEWORK => $params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey],
        ClassFilePlaceholders::NAMESPACE_APP => "",
        ClassFilePlaceholders::NAMESPACE_CLASS => $params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::NameSpaceKey],
        ClassFilePlaceholders::CLASS_NAME => $params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassNameKey],
        ClassFilePlaceholders::CLASS_DESCRIPTION => $params[\WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator::ClassDescriptionKey],
    );
  }

}
