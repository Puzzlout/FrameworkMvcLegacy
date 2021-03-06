<?php

namespace Puzzlout\Framework\Utility;

use Puzzlout\Framework\Core\Config;

class FileUploader extends \Puzzlout\Framework\Core\ApplicationComponent {

    public
            $rootDirectory = "",
            $uploadDirectory = "",
            $currentFile = null,
            $files = array(),
            $dataPost = array(),
            $resultJson = array();

    public function __construct(\Puzzlout\Framework\Core\Application $app) {
        parent::__construct($app);
        $this->rootDirectory = Config::Init($this->app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload);
    }

    public function FillInstance($data) {
        $this->files = $data["files"];
        $this->dataPost = $data["dataPost"];
        $this->resultJson = $data["resultJson"];
    }

    public function UploadFiles() {
        $this->uploadDirectory = $this->GetUploadDirectory();
        $this->resultJson["fileUploadResults"] = array();
        foreach ($this->files as $file) {
            $this->currentFile = new \Puzzlout\Framework\Core\BO\FileUploadResult($file["tmp_name"]);
            //Init object
            $document = $this->InitDocumentObject();
            //Check if file exist before adding a row in DB
            $this->currentFile->setFilePath($this->uploadDirectory . "/" . $document->document_value());
            \Puzzlout\Framework\Core\DirectoryManager::CreateDirectory($this->uploadDirectory);
            $fileExists = \Puzzlout\Framework\Core\DirectoryManager::FileExists($this->currentFile->filePath());
            $this->currentFile->setDoesExist($fileExists);
            //Add document to DB
            if (!$fileExists) {//Don't add the document in DB if already added
                $this->AddDocumentToDatabase($document);
                //Add document to uploads directory
                $uploaded = $this->UploadAFile($this->currentFile->tmpFilePath(), $this->currentFile->filePath());
                $this->currentFile->setIsUploaded($uploaded);
            } else {
                $this->currentFile->setIsUploaded(false);
            }

            array_push($this->resultJson["fileUploadResults"], $this->currentFile);
        }
        return $this->resultJson;
    }

    private function UploadAFile($tmp, $file) {
        if (move_uploaded_file($tmp, $file)) {
            return true;
        } else {
            return false;
        }
    }

    private function GetFileNameToSaveInDatabase() {
        return
                $this->dataPost["itemId"]
                . "_" . UUID::v4()
                . "." . $this->GetExtension();
    }

    private function GetExtension() {
        return substr($this->files["file"]["type"], strpos($this->files["file"]["type"], '/') + 1);
    }

    private function GetUploadDirectory() {
        return $this->rootDirectory . $this->GetCategory();
    }

    private function GetCategory() {
        return str_replace("_id", "", $this->dataPost["itemCategory"]);
    }

    private function GetSizeInKb() {
        $sizeInBytes = intval($this->files["file"]["size"]);
        return $sizeInBytes / 1024;
    }

    private function InitDocumentObject() {
        $document = new \Applications\EasyMvc\Models\Dao\Document();
        $document->setDocument_category($this->dataPost["itemCategory"]);
        $document->setDocument_content_type($this->GetExtension());
        $document->setDocument_value($this->GetFileNameToSaveInDatabase());
        $document->setDocument_size($this->GetSizeInKb());
        return $document;
    }

    private function AddDocumentToDatabase($document) {
        $db = new \Puzzlout\Framework\Dal\Managers('PDO', $this->app());
        $dal = $db->getDalInstance("Document", true);
        $dal->add($document);
    }

}
