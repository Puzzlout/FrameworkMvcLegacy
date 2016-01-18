<?php

/**
 *
 * @package		Basic MVC framework
 * @author		FWM DEV Team
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * PopUpHelper Class
 *
 * @package		Library
 * @category	Core
 * @author		Souvik Ghosh
 * @link		
 */

namespace WebDevJL\Framework\Core;

class PopUpResourceManager extends \WebDevJL\Framework\Core\ApplicationComponent {

    private $xmlContent = null;

    public function __construct(Application $app) {
        parent::__construct($app);
        //@todo: get the following outside of the constructor
        //$this->loadToolTipMessagefromXML();
    }

    /**
     * Fetches all messages associated with a particular
     * attribute passed through the JSON var param.
     */
    public function getTooltipMsgForAttribute($param) {
        $param_arr = json_decode($param, true);
        $msg_array = array();
        foreach ($this->xmlContent as $msg) {
            if ($msg->getAttribute('uicomponent') == 'tooltip' &&
                    $msg->getAttribute('targetcontroller') == $param_arr['targetcontroller'] &&
                    $msg->getAttribute('targetaction') == $param_arr['targetaction'] &&
                    in_array($msg->getAttribute('targetattr'), $param_arr['targetattr'])
            ) {
                //Check if delay exists as an attribute
                $delayshow = $msg->getAttribute('delayshow');
                if ($delayshow != '') {
                    //Check if delayhide exists in xml, then use it, else use 0 by default
                    $delayhide = ($msg->getAttribute('delayhide') != '') ? $msg->getAttribute('delayhide') : 0;

                    $msgconfig_arr = array('value' => $msg->getAttribute('value'), 'targetattr' => $msg->getAttribute('targetattr'), 'placement' => $msg->getAttribute('placement'), 'delayshow' => $delayshow, 'delayhide' => $delayhide);
                } else {
                    $msgconfig_arr = array('value' => $msg->getAttribute('value'), 'targetattr' => $msg->getAttribute('targetattr'), 'placement' => $msg->getAttribute('placement'));
                }
                array_push($msg_array, array('tooltipmsg' => $msgconfig_arr));
            }
        }

        return $msg_array;
    }

    /**
     * Fetches configurations for confirmBox/AlertBox
     * Accepts a json of the form:
     * {targetcontroller: the_controller, targetaction: the_action, operation: the_operation}
     */
    public function getConfirmBoxMsg($param) {
        $param_arr = json_decode($param, true);
        $msg_array = array();
        foreach ($this->xmlContent as $msg) {
            if (($msg->getAttribute('uicomponent') == 'confirm' || $msg->getAttribute('uicomponent') == 'alert') &&
                    $msg->getAttribute('targetcontroller') == $param_arr['targetcontroller'] &&
                    $msg->getAttribute('targetaction') == $param_arr['targetaction'] &&
                    in_array($msg->getAttribute('operation'), $param_arr['operation'])
            ) {
                array_push($msg_array, array('confirmmsg' => array('value' => $msg->getAttribute('value'), 'operation' => $msg->getAttribute('operation'))));
            }
        }

        return $msg_array;
    }

    /**
     * Fetches configurations for Prompt boxes
     * Accepts a json of the form:
     * {targetcontroller: the_controller, targetaction: the_action, operation: the_operation}
     */
    public function getPromptBoxMsg($param) {
        $param_arr = json_decode($param, true);
        $msg_array = array();
        foreach ($this->xmlContent as $msg) {
            if ($msg->getAttribute('uicomponent') == 'prompt' &&
                    $msg->getAttribute('targetcontroller') == $param_arr['targetcontroller'] &&
                    $msg->getAttribute('targetaction') == $param_arr['targetaction'] &&
                    in_array($msg->getAttribute('operation'), $param_arr['operation'])
            ) {
                array_push($msg_array, array('promptmsg' => array('value' => $msg->getAttribute('value'), 'operation' => $msg->getAttribute('operation'))));
            }
        }

        return $msg_array;
    }

    /**
     * Gets the settings for a module on the basis of which a 
     * tooltip would be shown where the text is truncated due
     * to insufficient space
     */
    public function getTooltipEllipsisSettings($param) {
        $param_arr = json_decode($param, true);
        $msg_array = array();
        foreach ($this->xmlContent as $msg) {
            if ($msg->getAttribute('uicomponent') == 'tooltip_ellipsis' &&
                    $msg->getAttribute('targetcontroller') == $param_arr['targetcontroller'] &&
                    $msg->getAttribute('targetaction') == $param_arr['targetaction']
            ) {
                $msg_array = array('charlimit' => $msg->getAttribute('charlimit'), 'placement' => $msg->getAttribute('placement'));
            }
        }

        return $msg_array;
    }

    /**
     * @todo: load from the db first
     * @todo: next generated php classes to access the data more easily.
     */
    public function loadToolTipMessagefromXML() {
        $placeholders = array(
            "{{culture}}" => $this->app()->locale
        );
        $filePath = "APP_ROOT_DIR" . strtr($this->app()->config()->Get(\WebDevJL\Framework\Enums\AppSettingKeys::TooltipsXmlFileName), $placeholders);
        $xmlReader = new \WebDevJL\Framework\Core\XmlReader($filePath);
        if (!$this->xmlContent) {
            $this->xmlContent = $xmlReader->ReturnFileContents("resource");
            return $this->xmlContent;
        }
        return false;
    }

}
