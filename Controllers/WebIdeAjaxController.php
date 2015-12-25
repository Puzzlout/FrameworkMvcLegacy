<?php

/**
 * Class to manage the Web IDE.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package WebIdeAjaxController
 */

namespace Library\Controllers;

use Library\Helpers\WebIdeAjaxHelper;
use Library\Helpers\WebIde\CreateFileHelper;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class WebIdeAjaxController extends \Library\Controllers\BaseController {

  /**
   * Retrieve the list of ListItem objects containing the folders found in the 
   * solution. The full list is filtered by the $filterRegex sent via the POST
   * request.
   */
  public function GetSolutionFolders() {
    $filterRegex = WebIdeAjaxHelper::Init()->GetFilterRegex($this->dataPost());
    $SolutionPathListArray = WebIdeAjaxHelper::Init()->GetSolutionDirectoryList($this->app);
    $AutocompletedFormattedList = WebIdeAjaxHelper::Init()->ExtractListItemsFrom($SolutionPathListArray, $filterRegex);
    $Viewmodel = \Library\ViewModels\WebIdeJsonVm::Init($this->app)->Fill($AutocompletedFormattedList);
    $this->viewModel = $Viewmodel;
  }
  
  /**
   * Retrieve the list of ListItem objects containing the files found in the 
   * solution. The full list is filtered by the $filterRegex sent via the POST
   * request.
   */
  public function GetSolutionFilesOnly() {
    $filterRegex = WebIdeAjaxHelper::Init()->GetFilterRegex($this->dataPost());
    $Files = WebIdeAjaxHelper::Init()->GetSolutionFilesOnly($this->app);
    $AutocompletedFormattedList = WebIdeAjaxHelper::Init()->ExtractListItemsFrom($Files, $filterRegex);
    $Viewmodel = \Library\ViewModels\WebIdeJsonVm::Init($this->app)->Fill($AutocompletedFormattedList);
    $this->viewModel = $Viewmodel;
  }

  /**
   * Retrieves a template contents from a fileType value sent in the POST request.
   */
  public function GetTemplateContents() {
    $templateContents = 
            CreateFileHelper::Init()
            ->GetFileType($this->dataPost())
            ->GetTemplateContents();
    $Viewmodel = \Library\ViewModels\WebIdeJsonVm::Init($this->app)->Fill($templateContents);
    $this->viewModel = $Viewmodel;
  }
  
  public function ProcessFileCreation() {
    $result = \Library\Helpers\WebIde\CreateFileHelper::Init()->SaveFile($this);
    $Viewmodel = new \Library\ViewModels\WebIdeJsonVm($this->app);
    $Viewmodel->Fill($result);
    $this->viewModel = $Viewmodel;
  }

}
