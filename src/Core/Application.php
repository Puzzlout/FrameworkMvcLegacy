<?php

namespace WebDevJL\Framework\Core;

use WebDevJL\Framework\Enums;
use WebDevJL\Framework\Enums\NameSpaceName;

abstract class Application extends ApplicationBase {

  public function __construct(ErrorManager $errorManager) {
    if (!$this->UnitTestingEnabled) {
      $this->ResourceManager = new ResourceManagers\ResourceBase($this);
      $this->error = $errorManager;
      $this->request = new Request($this);
      $this->response = new Response($this);
      $this->user = new User($this);
      $this->dal = new \WebDevJL\Framework\Dal\Managers('PDO', $this);
      $this->cultures = $this->GetCultureArray();
      $this->imageUtil = new \WebDevJL\Framework\Utility\ImageUtility($this);
      $this->locale = $this->request->initLanguage($this, "browser");
      $this->auth = new \WebDevJL\Framework\Security\AuthenticationManager($this);
      $this->toolTip = new PopUpResourceManager($this);
    }
  }

  /**
   * Retrieve the cultures from the database and transform the object list into
   * an associative array of following structure:
   * 
   * array(
   *    "xx-XX" => (array of F_culture_extension object),
   *    "yy-YY" => (array of F_culture_extension object),
   *    ...
   * )
   * 
   * @return associative array the array of culture
   */
  public function GetCultureArray() {
    $dal = $this->dal->getDalInstance();
    $dbFilters = new \WebDevJL\Framework\Dal\DbQueryFilters();
    $dbFilters->setOrderByFilters(array(\WebDevJL\Framework\BO\F_culture_extension::F_CULTURE_ID));
    $cultureObjects = $dal->selectMany(new \WebDevJL\Framework\BO\F_culture_extension(), $dbFilters);
    $cultureAssocArray = array(\WebDevJL\Framework\BO\F_culture_extension::FullArrayCultureKey => null);
    if (count($cultureObjects) > 0) {
      foreach ($cultureObjects as $cultureObj) {
        $cultureAssocArray
                [\WebDevJL\Framework\BO\F_culture_extension::FullArrayCultureKey]
                [$cultureObj->F_culture_language() . '-' . $cultureObj->F_culture_region()] = \WebDevJL\Framework\Helpers\CommonHelper::CleanPrefixedkeyInAssocArray((array) $cultureObj);
      }
    }
    return $cultureAssocArray[\WebDevJL\Framework\BO\F_culture_extension::FullArrayCultureKey];
  }

  /**
   * Retrieve the Controller instance that matches the Route instance.
   * @return \WebDevJL\Framework\Controllers\BaseController the Controller object
   */
  public function getController() {
    $router = new Router($this);
    $router->setCurrentRoute();
    $controllerObject = $this->GetControllerObject($router);
    $this->controller = $controllerObject;
    return $controllerObject;
  }

  /**
   * Builds the controller object from a route object.
   * 
   * @param \WebDevJL\Framework\Core\Route $route : the current route
   * @return \WebDevJL\Framework\Controllers\BaseController
   */
  private function GetControllerObject(\WebDevJL\Framework\Core\Router $router) {
    $controllerName = $this->BuildControllerName($router->currentRoute());
    $FrameworkControllers = "\WebDevJL\Framework\Generated\FrameworkControllers";
    $ApplicationControllers = "\Applications\\" .
            "APP_NAME" .
            "\Generated\\" .
            "APP_NAME" . "Controllers";

    $controllerClassName = $this->FindControllerClassName(
            $controllerName, $FrameworkControllers, $ApplicationControllers, $router
    );
    return $this->InstanciateController($controllerClassName, $router->currentRoute());
  }

  /**
   * Find the controller class name to instanciate.
   * 
   * @param string $controllerName : the controller to find
   * @param string $FrameworkControllersListClass : class name to the list of framework controllers list
   * @param string $ApplicationControllersListClass : class name to the list of current application controllers list
   * @param \WebDevJL\Framework\Core\Route $route : the current route
   */
  public function FindControllerClassName($controllerName, $FrameworkControllers, $ApplicationControllers, \WebDevJL\Framework\Core\Router $router) {
    $FrameworkControllers = $FrameworkControllers::GetList();
    $ApplicationControllers = $ApplicationControllers::GetList();
    $controllerClass = "\WebDevJL\Framework\Controllers\ErrorController";
    if (array_key_exists($controllerName, $FrameworkControllers)) {
      $frameworkCtrlFolderPath = NameSpaceName::LibFolderName . NameSpaceName::LibControllersFolderName;
      $controllerClass = $frameworkCtrlFolderPath . $controllerName;
      $router->isWsCall = TRUE;
    } else if (array_key_exists($controllerName, $ApplicationControllers)) {
      $appCtrlFolderPath = NameSpaceName::AppsFolderName . "\\" . $this->name . NameSpaceName::AppsControllersFolderName;
      $controllerClass = $appCtrlFolderPath . $controllerName;
    } else {
      error_log("The controller requested '$controllerClass' doesn't exist.");
      $router->currentRoute()->setModule("Error");
      $router->currentRoute()->setAction("ControllerNotFound");
    }
    return $controllerClass;
  }

  /**
   * Builds the controller name.
   * 
   * @param \WebDevJL\Framework\Core\Route $route
   * @return string
   */
  private function BuildControllerName(Route $route) {
    return ucfirst($route->module()) . Enums\FileNameConst::ControllerSuffix;
  }

  /**
   * Instanciate a controller from a name.
   * 
   * @param string $controllerClass
   * @param \WebDevJL\Framework\Core\Route $route
   * @return \WebDevJL\Framework\Controllers\BaseController
   * @throws \Exception : when the controller class can't be instanciated.
   */
  protected function InstanciateController($controllerClass, Route $route) {
    try {
      return new $controllerClass($this, $route->module(), $route->action());
    } catch (\Exception $exc) {
      $this->error->LogError($exc);
      throw new \Exception("Controller not loaded", Enums\ErrorCodes\FrameworkControllerConstants::ControllerNotLoadedValue, $exc);
    }
  }

  public function IsUnitTested() {
    $result = $this instanceof \WebDevJL\Framework\Tests\TestApplication;
    return $result;
  }
}
