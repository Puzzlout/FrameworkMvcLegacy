<?php

/**
 * The base of all view model, except the Error VM.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package BaseVm
 */

namespace WebDevJL\Framework\ViewModels;

class BaseVm implements \WebDevJL\Framework\Interfaces\IViewModel{

  /**
   * The instance of Application class.
   * 
   * @var \WebDevJL\Framework\Core\Application 
   */
  public $app;
  /**
   * The instance of the Error VM.
   * 
   * @var \WebDevJL\Framework\ViewModels\Error
   */
  public $errorVm;

  /**
   *
   * @var string
   */
  public $PageTitle = "";

  /**
   * The resource object of the current module (e.g. Controller).
   * 
   * @var array
   */
  public $ResourceObject;

  /**
   * The resources for a specific Action of the Controller
   * @var array
   */
  public $ActionResx;
  
  /**
   * Init the base VM object.
   */
  public function __construct(\WebDevJL\Framework\Core\Application $app) {
    $this->errorVm = new ErrorVm();
    $this->app = $app;
  }

  /**
   * Gets the PageTitle.
   * 
   * @return string
   */
  public function PageTitle() {
    return $this->PageTitle;
  }

  /**
   * Sets the PageTitle.
   * 
   * @param string $PageTitle
   */
  public function setPageTitle($PageTitle) {
    $this->PageTitle = $PageTitle;
  }
  
  /**
   * @todo: modify the call to init the resource object for the current request.
   */
  public function SetResourceObject() {
    $this->ResourceObject = $this->GetResourceObject();
  }

  public function GetResourceObject() {
    $context = new \WebDevJL\Framework\Core\Context($this->app);
    $route = \WebDevJL\Framework\Core\Router::Init($this->app)->currentRoute();
    $culture = $context->GetCultureLang() . "_" . $context->GetCultureRegion();

    $resxController = new \WebDevJL\Framework\Core\ResourceManagers\ControllerResxBase($this->app);
    $resxController->Instantiate(array(
        \WebDevJL\Framework\Core\ResourceManagers\ResourceBase::ModuleKey => $route->module(),
        \WebDevJL\Framework\Core\ResourceManagers\ResourceBase::ActionKey => $route->action(),
        \WebDevJL\Framework\Core\ResourceManagers\ResourceBase::CultureKey => $culture));
    return $resxController;
  }
  
  public function ResxFor($key) {
    $keyReady = $this->PrepareResxKey($key);
    return $this->ResourceObject->GetValue($keyReady);
  }
  
  public function PrepareResxKey($rawKey) {
    return strtolower($key);
  }
}
