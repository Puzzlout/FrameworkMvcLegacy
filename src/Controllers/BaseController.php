<?php

/**
 * Base controller to handle request and response from a web browser.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package BaseController
 */

namespace WebDevJL\Framework\Controllers;

use WebDevJL\Framework\Core\Context;
use WebDevJL\Framework\Core\Router;

abstract class BaseController extends \WebDevJL\Framework\Core\ApplicationComponent {

    /**
     * The Action.
     * 
     * @var string
     */
    protected $action;

    /**
     * The Module a.k.a. Controller.
     * 
     * @var string
     */
    protected $module;

    /**
     * The Page instance.
     * 
     * @var \WebDevJL\Framework\Core\Page 
     * @see \WebDevJL\Framework\Core\Page
     */
    protected $page;

    /**
     * The filepath of the view.
     * 
     * @var string
     */
    protected $view;

    /**
     * Shortcut of $app->dal().
     * 
     * @var Object
     * @see \WebDevJL\Framework\Dal\Managers
     */
    protected $managers;

    /**
     * Holds the $_POST value.
     * 
     * @var array
     */
    protected $dataPost = array();

    /**
     * Shortcut from $app->user() also used as $this->app()->user() in controllers.
     * 
     * @var \WebDevJL\Framework\BO\F_user 
     */
    protected $user;

    /**
     * Holds the $_FILES value.
     * 
     * @var array
     */
    protected $files = array();

    /**
     * Holds the values of the tooltips xml file.
     * @var array
     * @todo implement the code to read and stores the xml into the array.
     */
    protected $toolTips = array();

    /**
     * The View Model instance for the current request.
     * @var \WebDevJL\Framework\ViewModels\BaseVm
     */
    public $viewModel;

    /**
     * Instantiate the class.
     * 
     * @param \WebDevJL\Framework\Core\Application $app The application object
     * @param string $module The current module
     * @param string $action The current action
     */
    public function __construct(\WebDevJL\Framework\Core\Application $app, $module, $action) {
        parent::__construct($app);
        $this->managers = $app->dal();
        $this->page = new \WebDevJL\Framework\Core\Page($app);
        $this->user = $app->user();
        $this->setModule($module);
        $this->setAction($action);
    }

    public function FillInstance() {
        $this->viewModel = new \WebDevJL\Framework\ViewModels\BaseVm($this->app);
        $this->setView();
        $this->setDataPost(\WebDevJL\Framework\Core\Request::Init($this->app)->retrievePostAjaxData(false));
        $this->setUploadingFiles();
    }

    /**
     * Execute the Controller action.
     * 
     * @return \WebDevJL\Framework\ViewModels\BaseVm The output View Model
     * @throws \RuntimeException Handle the non-existing action in the current controller
     * @todo create an error code
     */
    public function execute() {
        $action = $this->action();
        if (!is_callable(array($this, $action))) {
            throw new \RuntimeException('The action <b>' . $this->action . '</b> is not defined for the module <b>' . ucfirst($this->module) . '</b>', 0, NULL);
        }
        $logGuid = \WebDevJL\Framework\Utility\TimeLogger::StartLogInfo($this->app(), get_class($this) . "->" . ucfirst($action));
        $viewModelObject = $this->$action();
        \WebDevJL\Framework\Utility\TimeLogger::EndLog($this->app(), $logGuid);
        return $viewModelObject;
    }

    /**
     * Get the page instance.
     * @return string
     */
    public function page() {
        return $this->page;
    }

    public function leftMenu() {
        return $this->leftMenu;
    }

    /**
     * Get the managers for any DAL queries.
     * @return string
     */
    public function managers() {
        return $this->managers;
    }

    /**
     * Get the current route module.
     * @return string
     */
    public function module() {
        return $this->module;
    }

    /**
     * Get the current route action.
     * @return string
     */
    public function action() {
        return $this->action;
    }

    /**
     * Get the $_POST value store in the controller instance.
     * @return array
     */
    public function dataPost() {
        return $this->dataPost;
    }

    /**
     * This is a shortcut to $this->app()->user()
     * 
     * @return \WebDevJL\Framework\Core\User
     */
    public function user() {
        return $this->user;
    }

    /**
     * Get the $_FILES value store in the controller instance.
     * @return array
     */
    public function files() {
        return $this->files;
    }

    public function toolTips() {
        return $this->toolTips;
    }

    /**
     * Save the module in the instance.
     * 
     * @param string $module The module, a.k.a controller name
     * @throws \InvalidArgumentException
     * @todo create error code for exception
     */
    public function setModule($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('The module value must be a string and not be empty');
        }

        $this->module = $module;
    }

    /**
     * Save the action value in the instance.
     * 
     * @param string $action The action
     * @throws \InvalidArgumentException
     * @todo create error code for exception
     */
    public function setAction($action) {
        if (!is_string($action) || empty($action)) {
            throw new \InvalidArgumentException('The action value must be a string and not be empty');
        }

        $this->action = $action;
    }

    /**
     * Set the view filename for the current request.
     * 
     * @throws \InvalidArgumentException thrown when the $action parameter is null or empty.
     * @todo create a error code.
     */
    public function setView() {
        if (!is_string($this->action) || empty($this->action)) {
            throw new \InvalidArgumentException('The action value must be a string and not be empty', 0);
        }
        if (\WebDevJL\Framework\Core\Request::Init($this->app)->IsPost()) {
            //No view needed for Ajax calls.
            return;
        }
        $this->view = \WebDevJL\Framework\Core\ViewLoader::Init($this)->GetView();
        $this->page->setContentFile($this->view);
    }

    /**
     * Stores the data of $_POST in the instance of controller.
     * 
     * @param array $dataPost The array of $_POST
     */
    public function setDataPost($dataPost) {
        if (!is_array($dataPost) || empty($dataPost)) {
            $this->dataPost = array();
        }

        $this->dataPost = $dataPost;
    }

    /**
     * Stores the data $_FILES in the instance of controller.
     */
    public function setUploadingFiles() {
        $this->files = $_FILES;
    }

    /**
     * Add the context the variables that are used to generated the output from the Views.
     */
    public function AddGlobalAppVariables() {
        $context = new Context($this->app);
        $culture = $context->GetCultureLang() . "_" . $context->GetCultureRegion();
        $this->page()->addVar('culture', $culture);
        $user = $this->app()->user->getAttribute(\WebDevJL\Framework\Enums\SessionKeys::UserConnected);
        $this->page()->addVar('user', $user[0]);
        $this->page()->addVar(Router::CurrentRouteVarKey, Router::Init($this->app)->currentRoute());
    }

    /**
     * Add to the page object the common variables to use in the views
     * 
     * Variables: none yet
     */
    protected function AddCommonVarsToPage() {
        
    }

}
