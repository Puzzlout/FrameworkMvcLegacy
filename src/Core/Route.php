<?php

/**
 * Route class
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package Route
 */

namespace WebDevJL\Framework\Core;

class Route {

  protected $action;
  protected $module;
  protected $url;
  protected $defaultUrl;

  const StartIndexNoVirtualPath = 1;
  const StartIndexWithVirtualPath = 2;

  public function __construct() {
    
  }

  /**
   * Sets the url, module and action of the current route.
   * @param string $url
   */
  public function Init($url) {
    $urlParts = explode("/", $url);

    $baseUrlConstainsVirtualPath = !(strcasecmp("/", "APP_BASE_URL") === 0);
    $startIndex = $baseUrlConstainsVirtualPath ? self::StartIndexWithVirtualPath : self::StartIndexNoVirtualPath;

    $this->setUrl($url);
    if(array_key_exists($startIndex, $urlParts) && array_key_exists($startIndex + 1, $urlParts)) {
      $this->setModule($urlParts[$startIndex]);
      $this->setAction($urlParts[$startIndex + 1]);
    } else {
      $this->Init($this->defaultUrl);
    }
  }

  /**
   * Gets url of the route.
   * @return string
   */
  public function url() {
    return $this->url;
  }

  /**
   * Gets the default url.
   * @return string
   */
  public function defaultUrl() {
    return $this->defaultUrl;
  }
  /**
   * Gets the action of the route.
   * @return string
   */
  public function action() {
    return $this->action;
  }

  /**
   * Gets the module of the route.
   * @return string
   */
  public function module() {
    return $this->module;
  }

  /**
   * Sets url of the route.
   * @return string
   */
  public function setUrl($url) {
    if (is_string($url)) {
      $this->url = "APP_BASE_URL" . $url;
    }
  }
  /**
   * Sets default urlif the requested url is worng.
   * @see Applications/EasyMvc/Config/AppSettings.php for DefaultUrl.
   * @return string
   */
  public function setDefaultUrl($defaultUrl) {
    $this->defaultUrl = "APP_BASE_URL" . $defaultUrl;
  }
  
  /**
   * Sets the action of the route.
   * @return string
   */
  public function setAction($action) {
    if (empty($action)) {
      throw new \Exception("Action cannot be empty", 0, NULL); //todo: create error code
    } else if (!is_string($action)) {
      throw new \Exception("Action must be a string", 0, NULL); //todo: create error code
    } else {
      $this->action = $action;
    }
  }

  /**
   * Sets the module of the route.
   * @return string
   */
  public function setModule($module) {
    if (empty($module)) {
      throw new \Exception("Module cannot be empty", 0, NULL); //todo: create error code
    } else if (!is_string($module)) {
      throw new \Exception("Module must be a string", 0, NULL); //todo: create error code
    } else {
      $this->module = $module;
    }
  }

}
