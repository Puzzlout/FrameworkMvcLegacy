<?php

/**
 * Constants of Framework folder values to help build system paths.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package FrameworkFolderName
 */

namespace WebDevJL\Framework\Enums;

abstract class FrameworkFolderName {

  const ControllersFolderName = "Library/Controllers/";
  const DalModulesFolderName = "Library/Dal/Modules/";
  const ViewsFolderName = "Library/Views/";
  const GeneratedFolderName = "Library/Generated/";
  const CORE = "Library/Core";
  const TEMPLATES_DIR = "CodeGenerators/templates/";
}
