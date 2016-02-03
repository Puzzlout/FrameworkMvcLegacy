<?php

/**
 * Class to handle file management.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package FileController
 */

namespace Puzzlout\Framework\Controllers;

class FileController extends \Puzzlout\Framework\Controllers\BaseController {

    public function LoadOne() {
        $result = $this->InitResponseWS();
        $dataPost = $this->dataPost();
        $manager = $this->managers()->getDalInstance("Document");
        $manager->setRootDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload));
        $manager->setWebDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::BaseUrl) . $this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootUploadsFolderPath));
        $document = new \Puzzlout\Framework\BO\F_document();
        $document->setDocument_id($dataPost['id']);
        $document = $manager->selectOne($document);
        if (!is_null($document)) {
            $directory = str_replace("_id", "", $document->document_category());
            $result['document'] = $document;
            $result["filepath"] = $this->getHostUrl() . $manager->webDirectory . $directory . '/' . $document->document_value();
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }

        $this->SendResponseWS(
                $result, array(
            "directory" => "common",
            "resx_file" => \Puzzlout\Framework\Enums\ResourceKeys\ResxFileNameKeys::File,
            "resx_key" => $this->action(),
            "step" => $result['success'] ? "success" : "error"
        ));
    }

    public function Load() {
        $result = $this->InitResponseWS();
        $dataPost = $this->dataPost();

        $manager = $this->managers()->getDalInstance("Document");
        $manager->setRootDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload));
        $manager->setWebDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::BaseUrl) . $this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootUploadsFolderPath));
        $directory = str_replace("_id", "", $dataPost['itemCategory']);
        $manager->setObjectDirectory($directory);
        $fileList = $manager->selectManyByCategoryAndId($dataPost['itemCategory'], $dataPost['itemId']);
        foreach ($fileList as $key => $file) {
            $fileList[$key]->filePath = $file->WebPath();
        }
        $result['fileResults'] = $fileList;

        $this->SendResponseWS(
                $result, array(
            "directory" => "common",
            "resx_file" => \Puzzlout\Framework\Enums\ResourceKeys\ResxFileNameKeys::File,
            "resx_key" => $this->action(),
            "step" => true ? "success" : "error"
        ));
    }

    public function Upload() {
        $result = $this->InitResponseWS();
        $dataPost = $this->dataPost();
        $files = $this->files();
        $manager = $this->managers()->getDalInstance("Document");
        $manager->setRootDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload));
        $manager->setWebDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::BaseUrl) . $this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootUploadsFolderPath));
        $directory = str_replace("_id", "", $dataPost['itemCategory']);
        $manager->setObjectDirectory($directory);
        if ($dataPost['itemReplace'] === "true") {
            $list = $manager->selectManyByCategoryAndId($dataPost['itemCategory'], $dataPost['itemId']);
        }
        $manager->setFilenamePrefix($dataPost['itemId'] . '_');
        $document = new \Applications\EasyMvc\Models\Dao\Document();
        $document->setDocument_category($dataPost['itemCategory']);
        if (isset($dataPost['title']) && $dataPost['title'] != "") {
            $document->setDocument_title($dataPost['title']);
        } else {
            $document->setDocument_title($files['file']['name']);
        }
        $result["dataOut"] = $manager->addWithFile($document, $files['file']);
        $document->setDocument_id($result['dataOut']);
        $result["document"] = $document;
        $result["filepath"] = $this->getHostUrl() . $manager->webDirectory . $directory . '/' . $document->document_value();
        if ($dataPost['itemReplace'] === "true" && $result["dataOut"] != -1) {
            $manager->DeleteObjectsWithFile($list, 'document_id');
        }
        $this->SendResponseWS(
                $result, array(
            "directory" => "common",
            "resx_file" => \Puzzlout\Framework\Enums\ResourceKeys\ResxFileNameKeys::File,
            "resx_key" => $this->action(),
            "step" => ($result["dataOut"] != -1) ? "success" : "error"
        ));
    }

    public function Remove() {
        $result = $this->InitResponseWS();
        $dataPost = $this->dataPost();

        $manager = $this->managers()->getDalInstance("Document");
        $manager->setRootDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload));
        $manager->setWebDirectory($this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::BaseUrl) . $this->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootUploadsFolderPath));
        $directory = str_replace("_id", "", $dataPost['itemCategory']);
        $manager->setObjectDirectory($directory);
        $document = new \Applications\EasyMvc\Models\Dao\Document();
        $document->setDocument_id($dataPost['document_id']);
        $document = $manager->selectOne($document);

        $result['dataOut'] = -1;
        if ($document !== NULL) {
            $result['dataOut'] = $manager->deleteWithFile($document, 'document_id');
        }

        $this->SendResponseWS(
                $result, array(
            "directory" => "common",
            "resx_file" => \Puzzlout\Framework\Enums\ResourceKeys\ResxFileNameKeys::File,
            "resx_key" => $this->action(),
            "step" => ($result["dataOut"] === true) ? "success" : "error"
        ));
    }

    /**
     * PDF copy method
     * $dataPost is actually having the Document model
     * $file is having the master file details in pseudo format
     */
    public static function copyFile($files, $dataPost, $caller) {

        $manager = $caller->managers()->getDalInstance("Document");
        $manager->setRootDirectory($caller->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootDocumentUpload));
        $manager->setWebDirectory($caller->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::BaseUrl) . $caller->app()->config()->get(\Puzzlout\Framework\Enums\AppSettingKeys::RootUploadsFolderPath));
        $directory = str_replace("_id", "", $dataPost['itemCategory']);
        $manager->setObjectDirectory($directory);
        if ($dataPost['itemReplace'] === "true") {
            $manager->selectManyByCategoryAndId($dataPost['itemCategory'], $dataPost['itemId']);
        }
        $manager->setFilenamePrefix($dataPost['itemId'] . '_');
        $document = new \Applications\EasyMvc\Models\Dao\Document();
        $document->setDocument_category($dataPost['itemCategory']);
        if (isset($dataPost['title']) && $dataPost['title'] != "") {
            $document->setDocument_title($dataPost['title']);
        } else {
            $document->setDocument_title($files['file']['name']);
        }

        $manager->copyWithFile($document, $files['file']);
    }

    private function getHostUrl() {
        //$ssl = (!empty(filter_input(INPUT_SERVER,'HTTPS')) && filter_input(INPUT_SERVER,'HTTPS') == 'on') ? true : false;
        //$sp = strtolower(filter_input(INPUT_SERVER,'SERVER_PROTOCOL'));
        //$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        //$port = filter_input(INPUT_SERVER,'SERVER_PORT');
        //$port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
        //$host = isset($host) ? $host : filter_input(INPUT_SERVER,'SERVER_NAME') . $port;
        return ""; //$protocol . '://' . $host;
    }

}
