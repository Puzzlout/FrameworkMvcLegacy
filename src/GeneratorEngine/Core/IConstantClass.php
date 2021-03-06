<?php

/**
 * Interface for handling generation of classes with dynamically generated constants.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package IConstantClass
 */

namespace Puzzlout\Framework\GeneratorEngine\Core;

interface IConstantClass {

    public function CloseArray($tabAmount = 0);

    public function WriteConstants($valueToTrim = ".php");

    public function WriteConstantsFromArray($array, $valueToTrim);

    public function WriteGetListMethod();
}
