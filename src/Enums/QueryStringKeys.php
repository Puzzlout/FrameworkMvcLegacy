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
 * QueryStringKeys Class
 *
 * @package		Library
 * @category	Enums
 * @category	QueryStringKeys
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Enums;

/**
 * Lists all the SessionKeys used throughout the applications so that we don't use hard-coded strings.
 */
abstract class QueryStringKeys {

    const EditionMode = "mode";
    const EditionModeAdd = "add";
    const EditionModeEdit = "edit";

}
