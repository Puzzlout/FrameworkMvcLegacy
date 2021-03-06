<?php

namespace Puzzlout\Framework\Core;

class Response extends ApplicationComponent {

    protected $page;

    public function addHeader($header) {
        header($header);
    }

    public function redirect($location) {
        header('Location: ' . $location);
        exit;
    }

    public function displayError(\Puzzlout\Framework\BO\Error $error) {
        $this->page = new Page($this->app);
        $this->page->addVar("error", $error);
        $this->page->setContentFile("APP_ROOT_DIR" . 'Errors/' . $error->errorId() . '.php');

        //$this->addHeader('HTTP/1.0 404 Not Found');

        $this->send();
    }

    public function send(\Puzzlout\Framework\ViewModels\BaseVm $ControllerVm) {
        if (!$this->app()->request()->IsPost()) {
            $this->page->addVar(\Applications\EasyMvc\Resources\Enums\ViewVariablesKeys::ControllerVm, $ControllerVm);
            return $this->page->GetOutput();
        }

        if (!($ControllerVm instanceof \Puzzlout\Framework\ViewModels\BaseJsonVm)) {
            throw new \InvalidArgumentException('$ControllerVm must be a valid \Puzzlout\Framework\ViewModels\BaseJsonVm object. See above dump.' . var_dump($ControllerVm), 0, null);
        }

        $VmJson = new \Puzzlout\Framework\ViewModels\BaseJsonVm($this->app());
        $VmJson = clone $ControllerVm;
        self::SetJsonResponseHeader();
        return $VmJson->Response();
    }

    public function setPage(Page $page) {
        $this->page = $page;
    }

    // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true.
    /*
     * Set cookie
     * 
     * params = [
     *    'name' => '',
     *    'value' => '',
     *    'expire' => '',
     *    'path' => '', 
     *    'domain' => '', 
     *    'secure' => '', 
     *    'httpOnly' => ''
     * ]
     */
    public function setCookie($params) {
        setcookie(
                $params['name'], $params['value'], $params['expire'], $params['path'], $params['domain'], $params['secure'], $params['httpOnly']
        );
    }

    /**
     * Set content type to JSON when replying to AJAX call.
     */
    public static function SetJsonResponseHeader() {
        header('Content-Type: application/json');
    }

}
