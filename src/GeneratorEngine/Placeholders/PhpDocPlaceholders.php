<?php

/**
* @author Jeremie Litzler
* @copyright Copyright (c) 2015
* @licence http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/WebDevJL/
* @since Version 1.0.0
* @package PhpDocPlaceholders
*/

namespace WebDevJL\Framework\GeneratorEngine\Placeholders;

class PhpDocPlaceholders {
  const AUTHOR = "{{phpdoc_author}}";
  const PACKAGE = "{{phpdoc_package}}";
  const COPYRIGHT_YEAR = "{{phpdoc_copyright_year}}";
  const LICENCE = "{{phpdoc_licence}}";
  const LINK = "{{phpdoc_link}}";
  const VERSION_NUMBER = "{{phpdoc_version_number}}";
  const SUBPACKAGE = "{{phpdoc_subpackage}}";
  const SET_PROPERTY = "{{phpdoc_property_set}}";
  const GET_PROPERTY = "{{phpdoc_property_get}}";
}