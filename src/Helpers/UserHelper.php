<?php

/**
 *
 * @package		Easy MVC Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * UserHelper Class
 *
 * @package		Library
 * @category	Helpers
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Helpers;

class UserHelper {

    public static function SaveRoutes($user, $routes) {
        $user->setAttribute(\Puzzlout\Framework\Enums\SessionKeys::UserRoutes, $routes);
    }

    public static function GetUserConnectedSession($user) {
        return $user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::UserConnected) ?
                $user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::UserConnected) : false;
    }

    public static function GetRoleFromType($userType) {
        $roleId = 1;
        switch ($userType) {
            case \Puzzlout\Framework\Enums\UserRoleType::Admin:
                $roleId = \Puzzlout\Framework\Enums\UserRole::Admin;
                break;
            case \Puzzlout\Framework\Enums\UserRoleType::ProjectManager:
                $roleId = \Puzzlout\Framework\Enums\UserRole::ProjectManager;
                break;
            case \Puzzlout\Framework\Enums\UserRoleType::Technician:
                $roleId = \Puzzlout\Framework\Enums\UserRole::Technician;
                break;
            case \Puzzlout\Framework\Enums\UserRoleType::Client:
                $roleId = \Puzzlout\Framework\Enums\UserRole::Client;
                break;
            case \Puzzlout\Framework\Enums\UserRoleType::Service:
                $roleId = \Puzzlout\Framework\Enums\UserRole::Service;
                break;
            default:
                $roleId = 0;
                break;
        }
        return $roleId;
    }

    /**
     * Checks if the users  are not stored in Session.
     * Stores the users
     * Set the data into the session for later use.
     *
     * @param /Library/Request $rq
     * @return array $lists : the lists of objects if any
     */
    public static function GetAndStoreUsersInSession($caller) {
        $users = array();
        if (!$caller->app()->user()->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::AllUsers)) {
            $manager = $caller->managers()->getDalInstance($caller->module());
            $users = $manager->selectAllUsers();

            $caller->app()->user->setAttribute(
                    \Puzzlout\Framework\Enums\SessionKeys::AllUsers, $users
            );
        } else {
            $users = $caller->app()->user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::AllUsers);
        }
        return $users;
    }

    /**
     * Add new user in session
     */
    public static function AddNewUserToSession($caller, $user) {
        $users = self::GetAndStoreUsersInSession($caller);
        $users[] = $user;
        $caller->app()->user->setAttribute(
                \Puzzlout\Framework\Enums\SessionKeys::AllUsers, $users
        );
    }

    /**
     * Categorize user list by type
     */
    public static function CategorizeUsersList($users) {
        $list = array();
        if (is_array($users) && count($users) > 0) {
            foreach ($users as $user) {
                $userType = $user->user_type();
                $list[$userType][] = $user;
            }
        }
        return $list;
    }

    public static function SetPropertyNamesForDualList() {
        return array(
            \Puzzlout\Framework\Enums\GenericViewVariablesKeys::property_id => "user_id",
            \Puzzlout\Framework\Enums\GenericViewVariablesKeys::property_name => "user_login"
        );
    }

    public static function PrepareUserObject($dataPost, $config, $setPass = false) {
        $user = new \Puzzlout\Framework\BO\User();
        $protect = new \Puzzlout\Framework\BL\Security\Protect($config);
        $user->setUser_hint($dataPost['user_hint']);
        $user->setUser_login($dataPost['user_login']);
        $user->setUser_email($dataPost['pm_email']);
        if ($setPass == true) {
            $user->setUser_password($protect->HashValue($config->get("PaswordSalt"), $dataPost['user_password']));
        }

        return $user;
    }

    public static function FindUserTypeFromObject($object) {
        return '';
    }

    public static function AddUser($caller, $user_value, $user_role_id, $user_type = NULL) {
        if ($user_type === NULL) {
            $user_type = self::GetTypeFromRoleId($user_role_id);
        }
        $dataPost = $caller->dataPost();
        $userEmail = self::GetEmailForUser($caller, $dataPost, $user_type, $user_value);
        $manager = $caller->managers()->getDalInstance('User');
        $generatedDataPost = array(
            'user_login' => $userEmail,
            'user_password' => $userEmail,
            'user_email' => $userEmail,
            'user_hint' => '',
            'user_role_id' => $user_role_id,
            'user_type' => $user_type,
            'user_value' => $user_value
        );
        $user = CommonHelper::PrepareUserObject($generatedDataPost, new \Puzzlout\Framework\BO\User());
        $protect = new \Puzzlout\Framework\BL\Security\Protect($caller->app()->config());
        $user->setUser_password($protect->HashValue($caller->app()->config()->get("PaswordSalt"), $user->user_password()));
        return $manager->add($user);
    }

    public static function GetEmailForUser($caller, $dataPost, $user_type, $user_value) {
        if (is_null($dataPost['user_email']) || $dataPost['user_email'] == '') {
            return ($user_type . '_' . $user_value . '@' . $caller->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::DefaultEmailDomainValue));
        } else {
            return $dataPost['user_email'];
        }
    }

    public static function GetTypeFromRoleId($role_id) {
        switch ($role_id) {
            default://role = 4 and others
                return "";
        }
    }

    //public static function EditUser($caller, $type) {
    //$dataPost = $caller->dataPost();
    //Get user from Session
    //
    //
    //Then update email from given value
    //$user = new \Applications\EasyMvc\Models\Dao\User();
    //
    //$user->setUser_email($dataPost[$type + "_email"]);
    //}
    //public static function GetGeneratedPostArray($originalPost) {
    //  
    //}
}
