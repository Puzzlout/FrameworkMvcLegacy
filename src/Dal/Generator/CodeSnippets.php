<?php

/**
 * List the template of code for the Dal generators.
 * 
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/
 * @since Version 1.0.0
 * @package		CodeSnippets
 */

namespace Puzzlout\Framework\Dal\Generator;

class CodeSnippets {

    const SNIPPET_NAMESPACE_FRAMEWORK = "namespace {{namespace_framework}};";
    const SNIPPET_NAMESPACE_APP = "namespace {{namespace_app}};";
    const SNIPPET_SET_PROPERTY_START = "public function set{{property_name_first_cap}}(\${{property_name}}) {";
    const SNIPPET_SET_PROPERTY_ASSIGNMENT = "\$this->{{property_name}} = \${{property_name}};";
    const SNIPPET_GET_PROPERTY_START = "public function {{property_name_first_cap}}() {";
    const SNIPPET_GET_PROPERTY_MIDDLE = "return \$this->{{property_name}};";
    const SNIPPET_CLOSING_CURLY_BRACKET = "}";

}
