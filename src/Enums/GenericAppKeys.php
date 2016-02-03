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
 * GenericAppKeys Class
 *
 * @package		Library
 * @category	Enums
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Enums;

/**
 * Lists all the SessionKeys used throughout the applications so that we don't use hard-coded strings.
 */
abstract class GenericAppKeys {

    const GET_METHOD = "get";
    const POST_METHOD = "post";
    const PUT_METHOD = "put";
    const PREFIX_FRAMEWORK_TABLE = "f_";
    const FRAMEWORK_DB_TABLE = "framework_db_table";
    const APP_DB_TABLE = "app_db_table";

}
