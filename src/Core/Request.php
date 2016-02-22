<?php

namespace Puzzlout\Framework\Core;

class Request {

    public $requestId;

    public static function Init() {
        $instance = new Request();
        return $instance;
    }

    public function __construct() {
        $this->requestId = \Puzzlout\Framework\Utility\UUID::v4();
    }

    public function requestId() {
        return $this->requestId;
    }

    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }

    public function cookieData($key) {
        $isKeyFound = $this->cookieExists($key);
        if (!$isKeyFound) {
            throw \Exception($key . ' is not present in the $_COOKIE', 0, null);
        }

        $result = filter_input(INPUT_COOKIE, $key);
        return $result;
    }

    public function cookieExists($key) {
        $result = filter_input(INPUT_COOKIE, $key);
        if (is_null($result)) {
            return false;
        }

        return isset($result);
    }

    public function getData($key) {
        return $this->getExists($key) ? $_GET[$key] : null;
    }

    public function getExists($key) {
        return isset($_GET[$key]);
    }

    public function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function postData($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function postExists($key) {
        return isset($_POST[$key]);
    }

    public function requestURI() {
        $key = 'REQUEST_URI';
        if (filter_input(INPUT_SERVER, $key)) {
            throw new \Exception($key . ' is not set in $_SERVER. See dump above.' . var_dump(filter_input_array(INPUT_SERVER)), 0, NULL);
        }
        return strtok($_SERVER[$key], '?');
    }

    protected function requestType() {
        $key = 'REQUEST_METHOD';
        if (filter_input(INPUT_SERVER, $key)) {
            throw new \Exception($key . ' is not set in $_SERVER. See dump above.' . var_dump(filter_input_array(INPUT_SERVER)), 0, NULL);
        }
        return $_SERVER[$key];
    }

    public function IsPost() {
        if ($this->requestType() === "POST") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Fetch the POST data from the php://input array which is compatible with 
     * modern post requests.
     * We keep the old $_POST source for the time being, even if it will be 
     * depreaced.
     *
     * @access	public
     * @param	bool
     * @return array The POST data (associative array if necessary)
     */
    public function retrievePostAjaxData($xss_clean = true) {
        $postData = $this->ParseDataFromPhpInput();
        if (count($postData) > 0) {
            return $postData;
        }
        $postData = $this->ParseDataFromGlobalVar();
        return $postData;
    }

    /**
     * Retrieve the POST data from php://input
     * @return array The POST data (associative array if necessary)
     */
    private function ParseDataFromPhpInput() {
        if (file_get_contents('php://input') == "") {
            return array();
        }
        $jsonDecodedData = json_decode(file_get_contents('php://input'));
        if (is_null($jsonDecodedData)) {
            return array();
        }
        $postData = get_object_vars($jsonDecodedData);
        if (empty($postData)) {
            return array();
        }
        return $postData;
    }

    /**
     * Retrieve the POST data from $_POST super global
     * @return array The POST data (associative array if necessary)
     */
    private function ParseDataFromGlobalVar() {
        $postData = filter_input_array(INPUT_POST);
        if (is_null($postData)) {
            return array();
        }
        $postDataCleaned = $this->FetchData($postData);
        return $postDataCleaned;
    }

    private function FetchData($postDataRaw) {
        foreach (array_keys($postDataRaw) as $key) {
            $postDataCleaned[$key] = $this->ValidateData($postDataRaw, $key, true);
        }
        return $postDataCleaned;
    }

    // --------------------------------------------------------------------

    /**
     * Fetch from array
     *
     * This is a helper function to retrieve values from global arrays
     *
     * @access	private
     * @param	array
     * @param	string
     * @param	bool
     * @return	string
     */
    private function ValidateData(&$array, $index = '', $xss_clean = false) {
        if (!isset($array[$index])) {
            return false;
        }

        if ($xss_clean === true && !($array[$index] instanceof \stdClass)) {
            $array[$index] = strip_tags($array[$index]);
            $array[$index] = filter_var($array[$index]);
//$security = new BL\Security\Security();
            //return $security->xss_clean($array[$index]);
        }

        return $array[$index];
    }

    public function RequestUriExist() {
        $result = filter_input(INPUT_SERVER, "REQUEST_URI");
        return !is_null($result) || $result;
    }

}
