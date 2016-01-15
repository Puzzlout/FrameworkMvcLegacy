<?php

/**
 * Static class to get the file name of a template.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package TemplateFileNameConstants
 */

namespace WebDevJL\Framework\GeneratorEngine\Templates;

class TemplateFileNameConstants {

    const RootLocation = "CodeGenerators/templates/";
    const TemplateExtension = ".tt";
    const ClassTemplate = "ClassTemplate";
    const ViewTemplate = "ViewTemplate";

    public static function GetFullNameForConst($constant) {
        $path = "APP_ROOT_DIR" . self::RootLocation . $constant . self::TemplateExtension;
        return $path;
    }

}
