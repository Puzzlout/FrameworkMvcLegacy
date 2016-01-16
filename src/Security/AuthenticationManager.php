<?php

/**
 * Provides the methods to manage user authentication. 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package AuthenticationManager
 */

namespace WebDevJL\Framework\Security;

use WebDevJL\Framework\Interfaces\IUser;
use WebDevJL\Framework\Enums\SessionKeys;

class AuthenticationManager extends \WebDevJL\Framework\Core\ApplicationComponent {

    /**
     * Authenticates a user from the given object. 
     * @param \WebDevJL\Framework\Interfaces\IUser $user
     * User object holding all the values necessary to connect the user.  
     */
    public function authenticate(IUser $user) {
        //set role
        $this->app->user->setAttribute(SessionKeys::UserRole, $user->getRole());
        //store user in session
        $this->app->user->setAttribute(SessionKeys::UserConnected, $user);
    }

    /**
     * Deauthenticate a user from current session. 
     * Then the session is detroyed. 
     */
    public function deauthenticate() {
        $this->app->user->unsetAttribute(SessionKeys::UserConnected);
        session_destroy();
    }

    /**
     * Retrieve the hash of the user password. 
     * @param \WebDevJL\Framework\BO\F_user $user
     * @return \WebDevJL\Framework\BO\F_user
     */
    public function HashUserPassword(\WebDevJL\Framework\BO\F_user $user) {
        $user->setF_user_salt($user->F_user_password_is_hashed() ? $user->F_user_salt() : \WebDevJL\Framework\Utility\UUID::v4());
        $user->setF_user_password($this->app->security()->HashValue($user->F_user_salt(), $user->F_user_password()));
        $user->setF_user_password_is_hashed(1);
        return $user;
    }

    public function CheckPassword($passwordGiven, \WebDevJL\Framework\BO\F_user $user, $isFirstLogin = FALSE) {
        $userToCheck = new \WebDevJL\Framework\BO\F_user();
        $userToCheck->setF_user_password($passwordGiven);
        if ($user->F_user_password_is_hashed() || !$isFirstLogin) {
            $userToCheck->setF_user_salt($user->F_user_salt());
            $userToCheck->setF_user_password_is_hashed(1);
            $userToCheck = $this->HashUserPassword($userToCheck);
        }

        return strcmp($user->f_user_password(), $userToCheck->f_user_password()) === 0 ? $user : FALSE;
    }

}
