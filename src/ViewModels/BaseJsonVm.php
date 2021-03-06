<?php

/**
 * The view model to store the state of an ajax request/response in JSON objects.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package BaseJsonVm
 */

namespace Puzzlout\Framework\ViewModels;

class BaseJsonVm extends BaseVm {

    /**
     *
     * @var mixed The response to use by the JavaScript Client 
     */
    protected $Response;

    /**
     * Getter for $Response member.
     * 
     * @return mixed
     * @see $Response member
     */
    public function Response() {
        return $this->Response;
    }

}
