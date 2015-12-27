<?php

namespace WebDevJL\Framework\Core;
use WebDevJL\Framework\FrameworkConstants;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class Router extends ApplicationComponent {

  public $pageUrls = array();
  public $isWsCall = false;
  public $routesXmlPath;
  protected $routes = array();
  protected $lastModified = 0; //of the routes xml file
  protected $currentRoute;

  const NO_ROUTE = 1;
  const CurrentRouteVarKey = "CurrentRoute";
  public function __construct(Application $app) {
    parent::__construct($app);
  }

  /**
   * Set the route of the current request. 
   * @param \WebDevJL\Framework\Core\Route $route
   */
  public function setCurrentRoute() {
    $this->currentRoute = $this->FindRouteMatch();
  }

  /**
   * Get the route of the current request. 
   * @param \WebDevJL\Framework\Core\Route $route
   */
  public function currentRoute() {
    return $this->currentRoute;
  }

  /**
   * Set the array of route objects. 
   * @param array $routes
   */
  public function setRoutes($routes) {
    $this->routes = $routes;
  }

  /**
   * Get the array of route objects. 
   * @param array $routes
   */
  public function routes() {
    return $this->routes;
  }

  /**
   * Add a route to the array of routes if not already in the array.
   * 
   * @param \WebDevJL\Framework\Core\Route $route
   */
  public function addRoute(Route $route) {
    if (!in_array($route, $this->routes)) {
      $this->routes[] = $route;
    }
  }

  /**
   * Instanciate the Route object from the current request.
   * 
   * @return \WebDevJL\Framework\Core\Route the Route instance
   */  
  private function FindRouteMatch() {
    $route = new Route();
    $route->setDefaultUrl($this->app->config->get(\WebDevJL\Framework\Enums\AppSettingKeys::DefaultUrl));
    $this->getRoute($route, $this->app->httpRequest->requestURI());
    return $route;
  }

  /**
   * Search for a match route in the last of routes based on a relative url from
   * the current request.
   * 
   * @param Route $route the instance of the Route to use in the current request.
   * @param string $url relative url of the current request. 
   * @return mixed \WebDevJL\Framework\Core\Route | \Exception
   * @throws \Exception Is thrown if FrameworkConstants::FrameworkConstants_BaseUrl is not set. 
   */
  public function getRoute(Route $route, $url) {
    $constantBaseUrlSet = defined(FrameworkConstants::FrameworkConstants_BaseUrl);
    if (!$constantBaseUrlSet) {
      //todo: create error code
      throw new \Exception("Named constant FrameworkConstants_BaseUrl must be set.", 0, NULL);
    } else {
      $route->Init($url);
    }
  }
}
