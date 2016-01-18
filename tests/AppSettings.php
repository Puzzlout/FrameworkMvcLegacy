<?php

/**
 * Array of values to use in the application.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package AppSettings
 */

namespace WebDevJL\Framework\Tests;

use WebDevJL\Framework\Enums\AppSettingKeys;

class AppSettings {

    public static function Init() {
        $configSettings = new AppSettings();
        return $configSettings;
    }

    /**
     * Retrieve the appsettings.
     * 
     * @return associative array : key/value array.
     * @see \WebDevJL\Framework\Enums\AppSettingKeys : list of keys used in the array.
     */
    public function GetSettings() {
        return array(
            AppSettingKeys::ApplicationBaseUrl => "/{{app_name}}/",
            AppSettingKeys::ApplicationMode => "DEV",
            AppSettingKeys::ApplicationsDalFolderPath => "\Applications\{{app_name}}\Models\Dal\\",
            AppSettingKeys::DefaultCulture => "en-US",
            AppSettingKeys::DefaultEmailDomainValue => "apps-jl.net",
            AppSettingKeys::DefaultUrl => "error/http404",
            AppSettingKeys::EncryptionKey => "4lx81277pVi606I4X77Q258bT7ua1GMZ",
            AppSettingKeys::ErrorLoggingMethod => "error-log-type-echo",
            AppSettingKeys::GoogleMapsCenterLat => "0.000000",
            AppSettingKeys::GoogleMapsCenterLng => "0.000000",
            AppSettingKeys::GoogleMapsNoLatLngIcon => "ltblu-blank_maps.png",
            AppSettingKeys::LogoImageUrl => "logo.png",
            AppSettingKeys::Myslq_host => "localhost",
            AppSettingKeys::Mysql_db_name => "easymvc_db",
            AppSettingKeys::Mysql_pwd => "jUL%C9%15",
            AppSettingKeys::Mysql_user => "webdevjl",
            AppSettingKeys::PasswordSalt => "g496lJL683yFiDzju2K94f1751Lo7WSw",
            AppSettingKeys::RootDocumentUpload => "ClientSide/upload/",
            AppSettingKeys::RootImageFolderPath => "../Web/images/",
            AppSettingKeys::UseEmailLinkForFirstLogin => true,
            AppSettingKeys::TooltipsXmlFileName => "Applications\{{app_name}}\Resources\Common\\tooltipandpopupstrings.{{culture}}.xml",
            AppSettingKeys::CacheTtl => 21600, //6 hours
            AppSettingKeys::CACHETYPEUSED => "TYPE_APC", //See possible value in constants of Library\Core\Cache\BaseCache.php
            AppSettingKeys::APP_ROOT_DIR => dirname(dirname(__FILE__)) . "/src/",
        );
    }

}
