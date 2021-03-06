<?php

/**
 * Class to build HTML links.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package LinkControl
 */

namespace Puzzlout\Framework\UC;

use Puzzlout\Framework\Enums\HtmlAttributes\HtmlAttributeConstants;
use Puzzlout\Framework\Enums\HtmlAttributes\LinkAttributeConstants;
use Puzzlout\Framework\Helpers\HtmlControlBuildHelper;

class LinkControl extends HtmlControlBase {

    public function __construct() {
        $this->Attributes = array();
        $this->HtmlOutput = "";
    }

    public static function Init() {
        $control = new LinkControl();
        return $control;
    }

    public function Simple($linkUrl, $linkText) {
        if (is_null($linkUrl) || empty($linkUrl)) {
            throw new \InvalidArgumentException('$linkUrl must be provided.', 0, null);
        }
        if (is_null($linkText) || empty($linkText)) {
            throw new \InvalidArgumentException('$linkText must be provided.', 0, null);
        }
        if (!\Puzzlout\Framework\Helpers\RegexHelper::Init($linkUrl)->IsMatch("`\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]`")) {
            throw new \InvalidArgumentException('$linkUrl ' . $linkUrl . ' is not valid.', 0, null);
        }

        array_push($this->Attributes, HtmlAttribute::Instanciate(HtmlAttributeConstants::Href, $linkUrl));
        array_push($this->Attributes, HtmlAttribute::Instanciate(LinkAttributeConstants::Target, "_BLANK"));
        $this->HtmlOutput = '<a {0} {1}>' . $linkText . '</a>';
        HtmlControlBuildHelper::Init()->GenerateAttributes($this);
        return $this->HtmlOutput;
    }

}
