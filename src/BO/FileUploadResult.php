<?php

/**
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/
 * @since Version 1.0.0
 * @package Error
 */

namespace Puzzlout\Framework\BO;

class FileUploadResult {

    public
            $filePath = "",
            $webPath = "",
            $tmpFilePath = "",
            $doesExist = false,
            $isUploaded = false;

    public function __construct($tmpFilePath) {
        $this->setTmpFilePath($tmpFilePath);
    }

    public function filePath() {
        return $this->filePath;
    }

    public function tmpFilePath() {
        return $this->tmpFilePath;
    }

    public function doesExist() {
        return $this->doesExist;
    }

    public function uploaded() {
        return $this->uploaded;
    }

    public function setFilePath($filePath) {
        $this->filePath = $filePath;
    }

    public function setTmpFilePath($tmpFilePath) {
        $this->tmpFilePath = $tmpFilePath;
    }

    public function setDoesExist($doesExist) {
        $this->doesExist = $doesExist;
    }

    public function setIsUploaded($uploaded) {
        $this->isUploaded = $uploaded;
    }

    public function setWebPath($webPath) {
        $this->webPath = $webPath;
    }

    public function getWebPath() {
        return $this->webPath;
    }

}
