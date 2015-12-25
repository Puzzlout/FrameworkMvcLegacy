<?php

namespace Library\Utility;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class TimeLogger extends Logger {

//  public function __construct() {
//    $this->logs[\Library\Enums\ResourceKeys\GlobalAppKeys::log_http_request] = array();
//    $this->logs[\Library\Enums\ResourceKeys\GlobalAppKeys::log_controller_method_request] = array();
//  }

  public static function SetLog($user, \Library\BO\F_log $log) {
    $logs = Logger::GetLogs($user);
    $logs[$log->F_log_guid()] = $log;
    Logger::StoreLogs($user, $logs);
  }

  public static function StartLog(\Library\Core\Application $app, $source, $type = NULL) {
    if (is_null($source)) {
      throw new \Exception("Log must have a source, e.g. __CLASSNAME__.__METHOD__", 0, NULL);//todo: create the error code.
    }
    $log = new \Library\BO\F_log();
    $log->setF_log_guid(UUID::v4());
    $log->setF_log_level($type);
    $log->setF_log_request_id($app->httpRequest()->requestId());
    $log->setF_log_start(Logger::GetTime());
    $log->setF_log_source($source);
    self::SetLog($app->user(), $log);
    return $log->F_log_guid();
  }

  public static function EndLog(\Library\Core\Application $app, $guid) {
    $logs = Logger::GetLogs($app->user());
    $log = $logs[$guid];
    $log->setF_log_end(Logger::GetTime());
    $log->setF_log_execution_time(
            ($log->f_log_end() - $log->f_log_start()) * 1000
    );
    $log->setF_log_start(DateTimeHelper::GetDateTimeWithMs($log->f_log_start()));
    $log->setF_log_end(DateTimeHelper::GetDateTimeWithMs($log->f_log_end()));
    Logger::AddLogToDatabase($app, $log);
    Logger::StoreLogs($app->user(), $logs);
  }

  public static function StartLogInfo(\Library\Core\Application $app, $source = NULL) {
    return self::StartLog($app, $source, \Library\BO\F_log_extension::LEVEL_INFO);
  }
  
  public static function StartLogDebug(\Library\Core\Application $app, $source = NULL) {
    return self::StartLog($app, $source, \Library\BO\F_log_extension::LEVEL_DEBUG);
  }

  public static function StartLogWarning(\Library\Core\Application $app, $source = NULL) {
    return self::StartLog($app, $source, \Library\BO\F_log_extension::LEVEL_WARNING);
  }

  public static function StartLogError(\Library\Core\Application $app, $source = NULL) {
    return self::StartLog($app, $source, \Library\BO\F_log_extension::LEVEL_ERROR);
  }

  public static function StartLogFatal(\Library\Core\Application $app, $source = NULL) {
    return self::StartLog($app, $source, \Library\BO\F_log_extension::LEVEL_FATAL);
  }
}
