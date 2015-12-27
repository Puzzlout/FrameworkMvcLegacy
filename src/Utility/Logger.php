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
 * Logger Class
 *
 * @package		Library
 * @category	Utility
 * @category	
 * @author		Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Utility;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class Logger {

  public static function StoreLogs($user, $logs) {
    $user->setAttribute("time_live_logs", $logs);
  }

  public static function GetLogs(\WebDevJL\Framework\Core\User $user) {
    return $user->getAttribute("time_live_logs");
  }

  public static function PrintOutLogs($logs) {
    \WebDevJL\Framework\Helpers\DebugHelper::WriteString(var_export($logs));
  }

  public static function AddLogToDatabase($app, $log) {
    $app->dal()->getDalInstance()->Add($log);
  }

  public static function GetTime() {
    return microtime(true);
  }

  public static function LogEx($class, $method, $typeSeparator, $message) {
    throw new \Exception($class . $typeSeparator . $method . " ==> " . $message);
  }

}
