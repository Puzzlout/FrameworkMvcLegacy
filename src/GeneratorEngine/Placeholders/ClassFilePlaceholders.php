<?php

/**
* @author Jeremie Litzler
* @copyright Copyright (c) 2015
* @licence http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/WebDevJL/
* @since Version 1.0.0
* @package ClassFilePlaceholders
*/

namespace WebDevJL\Framework\GeneratorEngine\Placeholders;

if (!FrameworkConstants_ExecutionAccessRestriction)
  exit('No direct script access allowed');

class ClassFilePlaceholders {
  const NAMESPACE_FRAMEWORK = "{{namespace_framework}}";
  const NAMESPACE_APP = "{{namespace_app}}";
  const NAMESPACE_CLASS = "{{namespace_class}}";
  const CLASS_NAME = "{{class_name}}";
  const PROPERTY_NAME_FIRST_CAP = "{{property_name_first_cap}}";
  const PROPERTY_NAME = "{{property_name}}";
  const CLASS_DESCRIPTION= "{{class_description}}";
}