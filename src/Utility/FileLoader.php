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
 * FileLoader Class
 *
 * @package		Library
 * @category	Utility
 * @category	
 * @author		Jeremie Litzler
 * @link		
 */

namespace Puzzlout\Framework\Utility;

use Puzzlout\Framework\Core\Config;

class FileLoader extends \Puzzlout\Framework\Core\ApplicationComponent {

    public
            $rootDirectory = "",
            $webDirectory = "",
            $uploadDirectory = "",
            $currentFile = null,
            $files = array(),
            $dataPost = array(),
            $resultJson = array();

    function __construct(\Puzzlout\Framework\Core\Application $app, $data) {
        parent::__construct($app);
        $this->rootDirectory = Config::Init($this->app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload);
        //@todo: webDirectory is different from context: is it a document or an image?
        $this->webDirectory = Config::Init($this->app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::DefaultUrl) . Config::Init($this->app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload);
        $this->dataPost = array_key_exists("dataPost", $data) ? $data["dataPost"] : [];
    }

    function LoadFiles() {
        $this->uploadDirectory = $this->GetUploadDirectory();
        $this->resultJson["fileResults"] = array();
        $documents = $this->LoadDocumentObjects();
        foreach ($documents as &$document) {
            $this->currentFile = new \Puzzlout\Framework\BO\FileUploadResult($document->document_value());
            $this->currentFile->setFilePath($this->uploadDirectory . "/" . $document->document_value());
            $this->currentFile->setWebPath($this->GetWebUploadDirectory() . "/" . $document->document_value());
            $fileExists = \Puzzlout\Framework\Core\DirectoryManager::FileExists($this->currentFile->filePath());
            if ($fileExists) {
                $this->currentFile->setDoesExist(true);
                array_push($this->resultJson["fileResults"], $this->currentFile);
            }
        }
        return $this->resultJson;
    }

    private function GetUploadDirectory() {
        return $this->rootDirectory . $this->GetCategory();
    }

    private function GetWebUploadDirectory() {
        return $this->webDirectory . $this->GetCategory();
    }

    private function GetCategory() {
        return str_replace("_id", "", $this->dataPost["itemCategory"]);
    }

    private function LoadDocumentObjects() {
        $db = new \Puzzlout\Framework\Dal\Managers('PDO', $this->app());
        $dal = $db->getDalInstance("Document", false);
        if (isset($this->dataPost["itemCategory"]) and isset($this->dataPost["itemId"]) and is_numeric($this->dataPost["itemId"])) {
            return $dal->selectManyByCategoryAndId($this->dataPost["itemCategory"], $this->dataPost["itemId"]);
        } else {
            return array();
        }
    }

}
