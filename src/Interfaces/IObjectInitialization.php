<?php

/**
 * Interface defining the contract to init objects
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package IObjectInitialization
 */

namespace Puzzlout\Framework\Interfaces;

interface IObjectInitialization {

    /**
     * Method that creates the instance of a class.
     */
    public static function Init();

    /**
     * Method that creates the instance of a class where $value can be used during
     * instantiation.
     * @param mixed $value The value that is used during instantiation.
     */
    public static function InitWith($value);
}
