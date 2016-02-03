<?php

namespace Puzzlout\Framework\Dal;

use Puzzlout\Framework\FrameworkConstants;

class Managers {

    /**
     * By default, the framework doesn't use another API than PDO but if you need
     * you can use mysql or mysqli. 
     * @var string
     * The API used to query the database. 
     */
    protected $databaseApi = null;

    /**
     *
     * @var object
     * The database connection object. 
     */
    protected $databaseConnection = null;

    /**
     *
     * @var string
     * The namespace to use in the case of a dal instance in the Applications. 
     */
    protected $dalApplicationsNamespace = "";

    /**
     *
     * @var string
     * The namespace to use in the case of a dal instance in the Framework. 
     */
    protected $dalFrameworkNameSpace = "";

    /**
     * The path to the dal folder in the application.
     * @var string
     */
    protected $dalApplicationFolderPath = "";

    /**
     *
     * @var array
     * Array containing the dal instances. 
     */
    protected $managers = array();

    /**
     *
     * @var array 
     * @todo To be implemented.
     */
    public $filters = array();

    /**
     * Magic method construct.
     * @param string $api
     * The SQL API to use. 
     * @param \Puzzlout\Framework\Core\Application $app
     * Instance of \Puzzlout\Framework\Core\Application to 
     * @todo Build an interface to use any API. Basically a MYSQL factory or a 
     * MYSQLI factory class must be built to use those API. The default is PDO.
     */
    public function __construct($api, \Puzzlout\Framework\Core\Application $app) {
        $this->databaseApi = $api;
        $this->databaseConnection = PDOFactory::getMysqlConnexion($app);
        $this->dalApplicationFolderPath = \Puzzlout\Framework\Core\Config::Init($app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::ApplicationsDalFolderPath);
        $this->dalApplicationsNamespace = $this->GetDalApplicationNamespace();
        $this->dalFrameworkNameSpace = "\Puzzlout\Framework\Dal\Modules\\";
    }

    private function GetDalApplicationNamespace() {
        $resultString = defined(FrameworkConstants::FrameworkConstants_TestAppName) ?
                str_replace(\Puzzlout\Framework\Enums\FrameworkPlaceholders::ApplicationNamePlaceHolder, FrameworkConstants_TestAppName, $this->dalApplicationFolderPath) :
                str_replace(\Puzzlout\Framework\Enums\FrameworkPlaceholders::ApplicationNamePlaceHolder, "APP_NAME", $this->dalApplicationFolderPath);
        return $resultString;
    }

    /**
     *
     * Retrieve the Dal instance for a given module. Otherwise, uses the CommonDal
     * module as a default
     * 
     *
     * A module is the name of the Dal Class, either found in Library/DAL/Modules
     * if $isCoreModule = true or in Applications/CurrentApp/Models/Dal otherwise.
     * 
     * @param string
     * $module: Name of the module to load. By default, it is null and load the
     * CommonDal module. 
     * @param type
     * $isCoreModule: Define if the module is to be load from the Library/DAL/Modules 
     * directory instead of the Applications/CurrentApp/Models/Dal. 
     * @return object
     * Variable of type \Puzzlout\Framework\Dal\BaseManager for the requested module. 
     * @throws \InvalidArgumentException
     * Thrown if the module isn't given in $module parameter. 
     */
    public function getDalInstance($module = NULL, $isCoreModule = false) {
        if (is_null($module)) {
            $module = "Common";
            $isCoreModule = true;
        }
        if (!isset($this->managers[$module])) {
            $dalName = ($isCoreModule) ?
                    $dalName = $this->dalFrameworkNameSpace . $module . 'Dal' :
                    $dalName = $this->dalApplicationsNamespace . $module . 'Dal';
            $this->filters = new DalFilters();
            $this->managers[$module] = new $dalName($this->databaseConnection, $this->filters);
        }
        return $this->managers[$module];
    }

}
