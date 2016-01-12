<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ViewLoader
 */

namespace WebDevJL\Framework\Core;

class ViewLoader implements \WebDevJL\Framework\Interfaces\IViewLoader {

  /**
   * The extension of a view file.
   */
  const VIEWFILEEXTENSION = ".php";

  /**
   *
   * @var Application The current app 
   */
  public $app;
  
  /**
   * 
   * @var \WebDevJL\Framework\Controllers\BaseController $controller The controller object 
   */
  public $controller;
  
  /**
   * Instantiate the class.
   * 
   * @param \WebDevJL\Framework\Controllers\BaseController $controller The controller to find the view.
   * @return \WebDevJL\Framework\Core\ViewLoader The instance of the class.
   */
  public static function Init(\WebDevJL\Framework\Controllers\BaseController $controller) {
    $viewLoader = new ViewLoader();
    $viewLoader->controller = $controller;
    return $viewLoader;
  }
  /**
   * Retrieve the view from either the Framework folder or the current Application folder.
   * 
   * @throws \WebDevJL\Framework\Exceptions\ViewNotFoundException Throws an exception if the view is not found 
   * @see \WebDevJL\Framework\Core\ViewLoader::GetFrameworkRootDir()
   * @see \WebDevJL\Framework\Core\ViewLoader::GetApplicationRootDir()
   * @todo create error code.
   */
  public function GetView() {
    $FrameworkView = $this->GetPathForView(DirectoryManager::GetFrameworkRootDir());
    $ApplicationView = $this->GetPathForView(DirectoryManager::GetApplicationRootDir());

    if (file_exists($FrameworkView)) {
      return $FrameworkView;
    } 
    if (file_exists($ApplicationView)) {
      return $ApplicationView;
    }
    
    throw new \WebDevJL\Framework\Exceptions\ViewNotFoundException("View " . $FrameworkView . " or " . $ApplicationView . " doesn't exists", 0, NULL);
    
  }

  /**
   * Retrieve the partial view from either the Framework folder or the current Application folder.
   * 
   * @param string $viewName The name of view to load
   * @throws \WebDevJL\Framework\Exceptions\ViewNotFoundException Throws an exception if the view is not found 
   * @see \WebDevJL\Framework\Core\ViewLoader::GetFrameworkRootDir()
   * @see \WebDevJL\Framework\Core\ViewLoader::GetApplicationRootDir()
   */
  public function GetPartialView($viewName) {
    $ListOfPathToCheck = array(
        DirectoryManager::Init($this->app)->GetFrameworkRootDir() . "Modules/",
        DirectoryManager::Init($this->app)->GetFrameworkRootDir() . $this->controller->module() . "/Modules/",
        DirectoryManager::Init($this->app)->GetApplicationRootDir() . "/Modules/",
        DirectoryManager::Init($this->app)->GetApplicationRootDir() . $this->controller->module() . "/Modules/"
    );
    foreach ($ListOfPathToCheck as $path) {
      $fileToCheck = $path . $viewName . self::VIEWFILEEXTENSION;
      if (file_exists($fileToCheck)) {
        return $fileToCheck;
      }
    }
    throw new \WebDevJL\Framework\Exceptions\ViewNotFoundException("Partial view \"" . $viewName . "\" not found in " . var_dump($ListOfPathToCheck));
  }

  /**
   * Computes the path of the view.
   * 
   * @param string $rootDir
   * @see \WebDevJL\Framework\Core\ViewLoader::GetFrameworkRootDir()
   * @see \WebDevJL\Framework\Core\ViewLoader::GetApplicationRootDir()
   * @return string The directory where to find the view.
   */
  public function GetPathForView($rootDir) {
    $path = Config::Init($this->app)->Get(\WebDevJL\Framework\Enums\AppSettingKeys::PACKAGE_ROOT_DIR) .
            $rootDir .
            ucfirst($this->controller->module()) .
            "/" .
            ucfirst($this->controller->action()) .
            self::VIEWFILEEXTENSION;
    return $path;
  }
}
