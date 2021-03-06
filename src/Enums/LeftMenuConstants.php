<?php

/**
 *
 * @package     Easy MVC Framework
 * @author      Jeremie Litzler
 * @copyright   Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * LeftMenuConstants Class
 *
 * @package       Library
 * @category    Enums
 * @author        Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Enums;

class LeftMenuConstants {
    /* Placeholders used at execution to build the menu items */

    const href = "{{href}}";
    const linkText = "{{linkText}}";
    const cssClass = "{{cssClass}}";
    const cssClassValue = "{{cssClassValue}}";
    const itemId = "{{itemId}}";

    /* Html tag helpers */
    const CLOSE_TAG = ">";
    const OPEN_LI = "<li>";
    const OPEN_LI_START = "<li ";
    const CLOSE_LI = "</li>";
    const OPEN_UL = "<ul>";
    const CLOSE_UL = "</ul>";
    const OPEN_SPAN = "<span>";
    const OPEN_SPAN_START = "<span ";
    const CLOSE_SPAN = "</span>";

}
