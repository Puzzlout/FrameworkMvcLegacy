<?php

namespace WebDevJL\Framework\BO;

/**
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.2.1
 * @package F_controller_resource
 */
class F_controller_resource extends \WebDevJL\Framework\Core\Entity {

    const F_CONTROLLER_RESOURCE_KEY = "f_controller_resource_key";
    const F_CONTROLLER_RESOURCE_MODULE = "f_controller_resource_module";
    const F_CONTROLLER_RESOURCE_ACTION = "f_controller_resource_action";
    const F_CONTROLLER_RESOURCE_VALUE = "f_controller_resource_value";
    const F_CONTROLLER_RESOURCE_COMMENT = "f_controller_resource_comment";
    const F_CULTURE_ID = "f_culture_id";

    protected
            $f_controller_resource_key,
            $f_controller_resource_module,
            $f_controller_resource_action,
            $f_controller_resource_value,
            $f_controller_resource_comment,
            $f_culture_id;

    /**
     * Sets f_controller_resource_key.
     */
    public function setF_controller_resource_key($f_controller_resource_key) {
        $this->f_controller_resource_key = $f_controller_resource_key;
    }

    /**
     * Sets f_controller_resource_module.
     */
    public function setF_controller_resource_module($f_controller_resource_module) {
        $this->f_controller_resource_module = $f_controller_resource_module;
    }

    /**
     * Sets f_controller_resource_action.
     */
    public function setF_controller_resource_action($f_controller_resource_action) {
        $this->f_controller_resource_action = $f_controller_resource_action;
    }

    /**
     * Sets f_controller_resource_value.
     */
    public function setF_controller_resource_value($f_controller_resource_value) {
        $this->f_controller_resource_value = $f_controller_resource_value;
    }

    /**
     * Sets f_controller_resource_comment.
     */
    public function setF_controller_resource_comment($f_controller_resource_comment) {
        $this->f_controller_resource_comment = $f_controller_resource_comment;
    }

    /**
     * Sets f_culture_id.
     */
    public function setF_culture_id($f_culture_id) {
        $this->f_culture_id = $f_culture_id;
    }

    /**
     * Gets f_controller_resource_key.
     */
    public function F_controller_resource_key() {
        return $this->f_controller_resource_key;
    }

    /**
     * Gets f_controller_resource_module.
     */
    public function F_controller_resource_module() {
        return $this->f_controller_resource_module;
    }

    /**
     * Gets f_controller_resource_action.
     */
    public function F_controller_resource_action() {
        return $this->f_controller_resource_action;
    }

    /**
     * Gets f_controller_resource_value.
     */
    public function F_controller_resource_value() {
        return $this->f_controller_resource_value;
    }

    /**
     * Gets f_controller_resource_comment.
     */
    public function F_controller_resource_comment() {
        return $this->f_controller_resource_comment;
    }

    /**
     * Gets f_culture_id.
     */
    public function F_culture_id() {
        return $this->f_culture_id;
    }

}
