<?php

/**
 *
 * @package		Easy MVC Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * LeftMenu Class
 *
 * @package		Library
 * @category	UC
 * @category	LeftMenu
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\UC;

class LeftMenu extends \Puzzlout\Framework\Core\ApplicationComponent {

    protected $app = null;
    protected $base_url = "";
    protected $resx_left_menu = array();
    protected $NOSUBMENUS = "NOSUBMENUS";
    protected $NOHEADERMENU = "NOHEADERMENU";

    public function __construct($app) {
        parent::__construct($app);
        //@todo: rethink how to setup the left menu: xml, php array or db table?
        //$this->resx_left_menu = $resx_left_menu;
        //@todo: move the following to a method that can be called at a later time. Not required in the constructor
        //$this->base_url = str_replace(\Puzzlout\Framework\Enums\FrameworkPlaceholders::ApplicationNamePlaceHolder, "APP_NAME", $this->app->config->get("base_url"));
    }

    /**
     * Returns a string representing the left menu
     * 
     * @return type string
     */
    public function Build() {
        $left_menu_output = "<ul class=\"content_left nav-sidebar\">";
        $main_menus = $this->_LoadXml();
        $left_menu_output .= $this->ProcessMainMenus($main_menus);
        $left_menu_output .= "</ul>";
        return $left_menu_output;
    }

    /**
     * Load the left menu from xml and returns the data to process
     * The list of DOMElementNode is the list of main menus to display
     * 
     * @return type DOMELementNodeList
     * @throws Exception when file is not found
     */
    private function _LoadXml() {
        $xml = new \DOMDocument;
        $filename = "APP_ROOT_DIR" . \Puzzlout\Framework\Enums\ApplicationFolderName::AppsFolderName . $this->app->name() . '/Config/menus.xml';
        if (file_exists($filename)) {
            $xml->load($filename);
        } else {
            throw new \Exception("In " . __CLASS__ . "->" . __METHOD__);
        }
        return $xml->getElementsByTagName("main_menu");
    }

    private function ProcessMainMenus($main_menus) {
        $output = "";
        foreach ($main_menus as $main_menu) {
            if ($main_menu->getAttribute('active') === "true") {
                $output .= $this->_AddMainMenu($main_menu);
            }
        }
        return $output;
    }

    private function _AddMainMenu($main_menu) {
        $menuHeaderOutput = array();
        $headers = $main_menu->getElementsByTagName("header");
        if ($headers !== null) {
            foreach ($headers as $link) {
                $isAvailable = $this->_CanDisplayMenuItem($link);
                if ($isAvailable) {
                    $menuHeaderOutput = $this->_AddLinkHeader($link);
                } else {
                    $menuHeaderOutput = array(
                        "output" => $this->NOHEADERMENU,
                        "hasLink" => false);
                }
            }
        }
        $menuSubsOutput = $this->_AddSubMenus($main_menu);
        $mainMenuBlockOutput = $this->ProcessMainMenuOutputResult($menuHeaderOutput, $menuSubsOutput);
        return $mainMenuBlockOutput;
    }

    private function ProcessMainMenuOutputResult($menuHeaderOutput, $menuSubsOutput) {
        $finalOutput = \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_LI_START . \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_TAG;
        if ($menuHeaderOutput["output"] !== $this->NOHEADERMENU && $menuSubsOutput !== $this->NOSUBMENUS) {
            $finalOutput .= $menuHeaderOutput["output"] . $menuSubsOutput . \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_LI;
        } else if (!$menuHeaderOutput["hasLink"] && $menuHeaderOutput["output"] !== $this->NOHEADERMENU && $menuSubsOutput === $this->NOSUBMENUS) {
            $finalOutput = "";
        } else if ($menuHeaderOutput["output"] === $this->NOHEADERMENU && $menuSubsOutput === $this->NOSUBMENUS) {
            $finalOutput = "";
        } else if ($menuHeaderOutput["hasLink"] && $menuSubsOutput === $this->NOSUBMENUS) {
            $finalOutput .= $menuHeaderOutput["output"] . \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_LI;
        }
        return $finalOutput;
    }

    private function _AddSubMenus($main_menu) {
        $ulElement = \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_UL;
        $subMenusXml = $main_menu->getElementsByTagName("submenu");
        $menuSubsOutput = $this->_ProcessSubMenus($subMenusXml);
        if ($menuSubsOutput === $this->NOSUBMENUS) {
            $ulElement = $menuSubsOutput;
        } else {
            $ulElement .= $menuSubsOutput . \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_UL;
        }

        return $ulElement;
    }

    private function _ProcessSubMenus($subMenusXml) {
        $output = "";
        if ($subMenusXml !== null) {
            foreach ($subMenusXml as $subMenuXml) {
                $isAvailable = $this->_CanDisplayMenuItem($subMenuXml);
                if ($isAvailable) {
                    $output .= $this->_AddLinkSubMenus($subMenuXml);
                }
            }
            if ($output === "") {
                $output = $this->NOSUBMENUS;
            }
        } else {
            $output = $this->NOSUBMENUS;
        }
        return $output;
    }

    private function _CanDisplayMenuItem($menuItem) {
        if ($menuItem->getAttribute('href')) {
            $href = $this->base_url . current(explode('?', $menuItem->getAttribute('href')));
            $routes = $this->app->user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::UserRoutes);
            $result = $routes && $menuItem->getAttribute('active') === "true" ?
                    array_reduce(
                            $routes, function ($carry, $route) use ($href) {
                        return $carry || ($href == $route->url());
                    }, false) :
                    false;
            return $result;
        }
        return true;
    }

    private function _AddLinkHeader($link) {
        $elementCssClass = $link->getAttribute("cssClass");
        $cssClassPrintedOut = $elementCssClass ?
                'class="' . \Puzzlout\Framework\Enums\LeftMenuConstants::cssClassValue . '"' :
                "";
        $placeholders = $this->_BuildPlaceholderList($link);
        $formattedString = $this->_GetStringForLinkHeader($cssClassPrintedOut);
        $html["hasLink"] = false;
        if ($link->getAttribute("enablelink") === "true") {
            $html["output"] = strtr($formattedString, $placeholders);
            $html["hasLink"] = true;
        } else {
            $html["output"] = \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_SPAN .
                    $this->resx_left_menu[$link->getAttribute("resourcekey")] .
                    \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_SPAN;
        }
        return $html;
    }

    private function _GetStringForLinkHeader($cssClassPrintedOut) {
        return
                '<a href="' . \Puzzlout\Framework\Enums\LeftMenuConstants::href . '">' .
                \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_SPAN_START .
                $cssClassPrintedOut .
                \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_TAG .
                \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_SPAN .
                \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_SPAN .
                \Puzzlout\Framework\Enums\LeftMenuConstants::linkText .
                \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_SPAN .
                '</a>';
    }

    private function _AddLinkSubMenus($link) {
        $formattedString = $this->_GetStringForSubMenuLink();
        $placeholders = $this->_BuildPlaceholderList($link);
        return strtr($formattedString, $placeholders);
    }

    private function _GetStringForSubMenuLink() {
        return
                \Puzzlout\Framework\Enums\LeftMenuConstants::OPEN_LI .
                '<a ' .
                'href="' . \Puzzlout\Framework\Enums\LeftMenuConstants::href . '"' .
                'id="' . \Puzzlout\Framework\Enums\LeftMenuConstants::itemId . '">' .
                \Puzzlout\Framework\Enums\LeftMenuConstants::linkText .
                '</a>' .
                \Puzzlout\Framework\Enums\LeftMenuConstants::CLOSE_LI;
    }

    private function _BuildPlaceholderList($link) {
        $elementCssClass = $link->getAttribute("cssClass");
        return array(
            \Puzzlout\Framework\Enums\LeftMenuConstants::href => $this->base_url . $link->getAttribute("href"),
            \Puzzlout\Framework\Enums\LeftMenuConstants::linkText => $this->resx_left_menu[$link->getAttribute("resourcekey")],
            \Puzzlout\Framework\Enums\LeftMenuConstants::cssClassValue => $elementCssClass ? $elementCssClass : ""
        );
    }

}
