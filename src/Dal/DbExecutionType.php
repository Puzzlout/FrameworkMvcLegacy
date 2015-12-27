<?php

/**
 * Constant list for the type of sql queries.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DbExecutionType
 */

namespace WebDevJL\Framework\Dal;

if (!FrameworkConstants_ExecutionAccessRestriction)
  exit('No direct script access allowed');

class DbExecutionType {
  const SELECT = "SELECT";
  const UPDATE = "UPDATE";
  const DELETE = "DELETE";
  const INSERT = "INSERT";
  const SHOWTABLES = "SHOWTABLES";
  const COLUMNNAMES = "COLUMNNAMES";
  const COLUMNMETAS = "COLUMNMETAS";
  const MULTIROWSET = "MULTIROWSET";
}