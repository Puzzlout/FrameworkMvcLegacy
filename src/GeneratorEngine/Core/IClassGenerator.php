<?php

/**
 * Interface for handling generation of classes.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package IClassGenerator
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

interface IClassGenerator {

    public function BuildClass();

    public function WriteAssociativeArrayValueAsNewArray($value, $tabAmount = 0);

    public function WriteAssociativeArrayValueWithKeyAndValue($key, $value, $tabAmount = 0);

    public function WriteContent();

    public function WriteNewArrayAndItsContents($array, $arrayOpened = FALSE, $tabAmount = 0);
}
