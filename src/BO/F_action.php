<?php

/**
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package F_action
 */

namespace WebDevJL\Framework\BO;

class F_action extends \WebDevJL\Framework\Core\Entity {

    const F_ACTION_KEY = "f_action_key";
    const F_ACTION_DESCRIPTION = "f_action_description";

    protected
            $f_action_key,
            $f_action_description;

    /**
     * Sets f_action_key.
     */
    public function setF_action_key($f_action_key) {
        $this->f_action_key = $f_action_key;
    }

    /**
     * Sets f_action_description.
     */
    public function setF_action_description($f_action_description) {
        $this->f_action_description = $f_action_description;
    }

    /**
     * Gets f_action_key.
     */
    public function F_action_key() {
        return $this->f_action_key;
    }

    /**
     * Gets f_action_description.
     */
    public function F_action_description() {
        return $this->f_action_description;
    }

}
