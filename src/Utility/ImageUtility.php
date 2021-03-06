<?php

namespace Puzzlout\Framework\Utility;

class ImageUtility extends \Puzzlout\Framework\Core\ApplicationComponent {

    protected $settings = array();

    public function getImageUrl($image_name) {
        if (isset($image_name) || $image_name === "") {
            $imageFolderPath = \Puzzlout\Framework\Core\Config::Init($this->app)->Get("RootImageFolderPath");

            return $imageFolderPath . $image_name;
        }
        throw \InvalidArgumentException("Missing Image name!");
    }

}
