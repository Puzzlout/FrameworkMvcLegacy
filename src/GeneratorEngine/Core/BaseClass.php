<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package BaseClass
 */

namespace WebDevJL\Framework\GeneratorEngine\Core;

abstract class BaseClass extends \WebDevJL\Framework\Core\ApplicationComponent {

    const NameSpaceKey = "NameSpaceKey";
    const ClassNameKey = "ClassNameKey";
    const DestinationDirKey = "DestinationDirKey";
    const Key = "Key";
    const FolderSuffix = "Folder";
    const ClassDescriptionKey = "ClassDescriptionKey";
    const CultureKey = "CultureKey";
    const ClassDerivation = "ClassDerivationKey";

    /**
     * The path where the class file generated must be saved.
     * @var string 
     */
    public $destinationDir;

    /**
     * The Class name.
     * @var string 
     */
    public $className;

    /**
     * The computed value of $className with the extension ".php".
     * @var string 
     */
    public $fileName;

    /**
     * The data to use to write the content of the class.
     * @var array(of String)  
     */
    public $data;

    /**
     * The flag to know if the class is a framework and application class.
     */
    public $isFrameworkClass = true;

}
