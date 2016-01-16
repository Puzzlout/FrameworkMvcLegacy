<?php

namespace WebDevJL\Framework\Core;

class User extends ApplicationComponent {

    private $appPrefix = "";

    /**
     * Constructor: set the appPrefix to set in front of all session values 
     * @param \WebDevJL\Framework\Core\Application $app
     */
    public function __construct(Application $app) {
        parent::__construct($app);
        $this->appPrefix = strtolower($app->name());
    }

    /**
     * Set a value in current session. 
     * @param string $sessionKey
     * The session key value under which the value is stored. The set of values is
     *  found in the class(es) \WebDevJL\Framework\Enums\SessionKeys (Framework) or
     *  \Application\YourApp\Resources\Enums\SessionKeys (Application) 
     * @param mixed $value
     * The value can any type: int, string, array, object instance of any class. 
     */
    public function setAttribute($sessionKey, $value) {
        $_SESSION[$this->GetKey($sessionKey)] = $value;
    }

    /**
     * Get a key from a given value. 
     * @param string $key
     * The set of values is found in the class(es) \WebDevJL\Framework\Enums\SessionKeys (Framework) or
     *  \Application\YourApp\Resources\Enums\SessionKeys (Application) 
     * @return string
     * The computed value of $appPrefix and $key. 
     */
    public function GetKey($key) {
        return $this->appPrefix . "::" . $key;
    }

    /**
     * Get a value in current session from a given key. 
     * @param sring $sessionKey
     * The key to use to find the associated value. The set of values is found in 
     * the class(es) \WebDevJL\Framework\Enums\SessionKeys (Framework) or
     * \Application\YourApp\Resources\Enums\SessionKeys (Application) 
     * @return mixed
     * The value can any type: int, string, array, object instance of any class.
     * If value is not set, then return FALSE. 
     */
    public function getAttribute($sessionKey) {
        return
                isset($_SESSION[$this->GetKey($sessionKey)]) ?
                $_SESSION[$this->GetKey($sessionKey)] :
                FALSE;
    }

    /**
     * Remove a session-stored variable based on a given key. 
     * @param string $key
     * A string value using the set of values is found in the class(es) 
     * \WebDevJL\Framework\Enums\SessionKeys (Framework) or
     *  \Application\YourApp\Resources\Enums\SessionKeys (Application). 
     */
    public function unsetAttribute($key) {
        unset($_SESSION[$this->GetKey($key)]);
    }

    /**
     * Checks if the current user is connected. 
     * @return bool
     * Values: TRUE or FALSE 
     */
    public function isConnected() {
        return $this->getAttribute(\WebDevJL\Framework\Enums\SessionKeys::UserConnected);
    }

    /**
     * Gets the user role. 
     * @return string
     * Role value of the current user. 
     */
    public function getRole() {
        return $this->getAttribute(\WebDevJL\Framework\Enums\SessionKeys::UserRole);
    }

}
