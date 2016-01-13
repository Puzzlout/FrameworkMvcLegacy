<?php

/**
 * Class to build script tag elements.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ScriptControl
 */

namespace WebDevJL\Framework\UC;

use WebDevJL\Framework\Enums\HtmlAttributes\HtmlAttributeConstants;
use WebDevJL\Framework\Helpers\HtmlControlBuildHelper;

class ScriptControl extends HtmlControlBase implements \WebDevJL\Framework\Interfaces\IHtmlControlUrlBuilder{

  public function __construct() {
    $this->Attributes = array();
    $this->HtmlOutput = "";
  }
  
  public static function Init() {
    $control = new ScriptControl();
    return $control;
  }
  
  /**
   * 
   * @see \WebDevJL\Framework\Interfaces\IHtmlControlUrlBuilder
   * @return string
   */
  public function ForInternalResource($jsFilePath) {
    $href = "APP_BASE_URL" . $jsFilePath;
    $this->GenerateOutput($href);
    return $this->HtmlOutput;
  }
  
  /**
   * 
   * @see \WebDevJL\Framework\Interfaces\IHtmlControlUrlBuilder
   * @return string
   */
  public function ForExternalResource($jsFileUrl) {
    $this->GenerateOutput($jsFileUrl);
    return $this->HtmlOutput;
  }
  
  /**
   * Generates a script html tag to include a script in the DOM
   * @param string $source The source to load as a script.
   */
  private function GenerateOutput($source) {
    array_push($this->Attributes, HtmlAttribute::Instanciate(HtmlAttributeConstants::Src, $source));
    $this->HtmlOutput = '<script type="application/javascript" {0}></script>';
    HtmlControlBuildHelper::Init()->GenerateAttributes($this);
  }
}
