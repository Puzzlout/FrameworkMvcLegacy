<?php

namespace WebDevJL\Framework\Interfaces;

use WebDevJL\Framework\Interfaces\IUser;

interface IAuthProvider {

  /**
   * @return IUser
   */
  public function getUser();

  public function getUserType();
}
