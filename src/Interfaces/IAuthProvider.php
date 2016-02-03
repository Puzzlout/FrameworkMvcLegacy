<?php

namespace Puzzlout\Framework\Interfaces;

use Puzzlout\Framework\Interfaces\IUser;

interface IAuthProvider {

    /**
     * @return IUser
     */
    public function getUser();

    public function getUserType();
}
