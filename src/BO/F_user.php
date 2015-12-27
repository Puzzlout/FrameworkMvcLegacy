<?php

namespace WebDevJL\Framework\BO;
if (!FrameworkConstants_ExecutionAccessRestriction) { exit('No direct script access allowed'); }

/**
* @author Jeremie Litzler
* @copyright Copyright (c) 2015
* @licence http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/WebDevJL/
* @since Version 1.0.0
* @package F_user
*/


class F_user extends \WebDevJL\Framework\Core\Entity implements \WebDevJL\Framework\Interfaces\IUser {
  const F_USER_ID = "f_user_id";
  const F_USER_LOGIN = "f_user_login";
  const F_USER_PASSWORD = "f_user_password";
  const F_USER_PASSWORD_IS_HASHED = "f_user_password_is_hashed";
  const F_USER_TOKEN = "f_user_token";
  const F_USER_SALT = "f_user_salt";
  const F_USER_HINT = "f_user_hint";
  const F_USER_EMAIL = "f_user_email";
  const F_USER_ROLE_ID = "f_user_role_id";
  const F_USER_SESSION_ID = "f_user_session_id";

  protected 
    $f_user_id,
    $f_user_login,
    $f_user_password,
    $f_user_password_is_hashed,
    $f_user_token,
    $f_user_salt,
    $f_user_hint,
    $f_user_email,
    $f_user_role_id,
    $f_user_session_id;

  /**  
  * Sets f_user_id.
  */
  public function setF_user_id($f_user_id) {
      $this->f_user_id = $f_user_id;
  }

  /**  
  * Sets f_user_login.
  */
  public function setF_user_login($f_user_login) {
      $this->f_user_login = $f_user_login;
  }

  /**  
  * Sets f_user_password.
  */
  public function setF_user_password($f_user_password) {
      $this->f_user_password = $f_user_password;
  }

  /**  
  * Sets f_user_password_is_hashed.
  */
  public function setF_user_password_is_hashed($f_user_password_is_hashed) {
      $this->f_user_password_is_hashed = $f_user_password_is_hashed;
  }

  /**  
  * Sets f_user_token.
  */
  public function setF_user_token($f_user_token) {
      $this->f_user_token = $f_user_token;
  }

  /**  
  * Sets f_user_salt.
  */
  public function setF_user_salt($f_user_salt) {
      $this->f_user_salt = $f_user_salt;
  }

  /**  
  * Sets f_user_hint.
  */
  public function setF_user_hint($f_user_hint) {
      $this->f_user_hint = $f_user_hint;
  }

  /**  
  * Sets f_user_email.
  */
  public function setF_user_email($f_user_email) {
      $this->f_user_email = $f_user_email;
  }

  /**  
  * Sets f_user_role_id.
  */
  public function setF_user_role_id($f_user_role_id) {
      $this->f_user_role_id = $f_user_role_id;
  }

  /**  
  * Sets f_user_session_id.
  */
  public function setF_user_session_id($f_user_session_id) {
      $this->f_user_session_id = $f_user_session_id;
  }

  /**  
  * Gets f_user_id.
  */
  public function F_user_id() {
    return $this->f_user_id;
  }

  /**  
  * Gets f_user_login.
  */
  public function F_user_login() {
    return $this->f_user_login;
  }

  /**  
  * Gets f_user_password.
  */
  public function F_user_password() {
    return $this->f_user_password;
  }

  /**  
  * Gets f_user_password_is_hashed.
  */
  public function F_user_password_is_hashed() {
    return $this->f_user_password_is_hashed;
  }

  /**  
  * Gets f_user_token.
  */
  public function F_user_token() {
    return $this->f_user_token;
  }

  /**  
  * Gets f_user_salt.
  */
  public function F_user_salt() {
    return $this->f_user_salt;
  }

  /**  
  * Gets f_user_hint.
  */
  public function F_user_hint() {
    return $this->f_user_hint;
  }

  /**  
  * Gets f_user_email.
  */
  public function F_user_email() {
    return $this->f_user_email;
  }

  /**  
  * Gets f_user_role_id.
  */
  public function F_user_role_id() {
    return $this->f_user_role_id;
  }

  /**  
  * Gets f_user_session_id.
  */
  public function F_user_session_id() {
    return $this->f_user_session_id;
  }

  public function getRole() {
    return $this->f_user_role_id;
  }

}