<?php

/**
 * Controller to display the error result to the user.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ErrorController
 */

namespace WebDevJL\Framework\Controllers;

class ErrorController extends \WebDevJL\Framework\Controllers\BaseController {

  public function ControllerNotFound() {
    $this->viewModel->errorVm->errorId(0);
    $this->viewModel->errorVm->errorMessage("Controller Not Found");
  }

  public function Http404() {
    $this->viewModel = new \WebDevJL\Framework\ViewModels\HttpErrorVm($this->app());
    $this->viewModel->errorVm->errorId(404);
    $this->viewModel->errorVm->errorMessage("Page not found");
  }

}
