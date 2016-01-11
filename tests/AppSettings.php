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
        \WebDevJL\Framework\Enums\AppSettingKeys::ApplicationName => "UnitTestingApp",
        \WebDevJL\Framework\Enums\AppSettingKeys::ApplicationBaseUrl => "/{{app_name}}/",
        \WebDevJL\Framework\Enums\AppSettingKeys::ApplicationMode => "DEV",
        \WebDevJL\Framework\Enums\AppSettingKeys::ApplicationsDalFolderPath => "\Applications\{{app_name}}\Models\Dal\\",
        \WebDevJL\Framework\Enums\AppSettingKeys::DefaultCulture => "en-US",
        \WebDevJL\Framework\Enums\AppSettingKeys::DefaultEmailDomainValue => "apps-jl.net",
        \WebDevJL\Framework\Enums\AppSettingKeys::DefaultUrl => "error/http404",
        \WebDevJL\Framework\Enums\AppSettingKeys::EncryptionKey => "4lx81277pVi606I4X77Q258bT7ua1GMZ",
        \WebDevJL\Framework\Enums\AppSettingKeys::ErrorLoggingMethod => "error-log-type-echo",
        \WebDevJL\Framework\Enums\AppSettingKeys::GoogleMapsCenterLat => "0.000000",
        \WebDevJL\Framework\Enums\AppSettingKeys::GoogleMapsCenterLng => "0.000000",
        \WebDevJL\Framework\Enums\AppSettingKeys::GoogleMapsNoLatLngIcon => "ltblu-blank_maps.png",
        \WebDevJL\Framework\Enums\AppSettingKeys::LogoImageUrl => "logo.png",
        \WebDevJL\Framework\Enums\AppSettingKeys::Myslq_host => "localhost",
        \WebDevJL\Framework\Enums\AppSettingKeys::Mysql_db_name => "",
        \WebDevJL\Framework\Enums\AppSettingKeys::Mysql_pwd => "",
        \WebDevJL\Framework\Enums\AppSettingKeys::Mysql_user => "",
        \WebDevJL\Framework\Enums\AppSettingKeys::PasswordSalt => "g496lJL683yFiDzju2K94f1751Lo7WSw",
        \WebDevJL\Framework\Enums\AppSettingKeys::RootDocumentUpload => "",
        \WebDevJL\Framework\Enums\AppSettingKeys::RootImageFolderPath => "",
        \WebDevJL\Framework\Enums\AppSettingKeys::UseEmailLinkForFirstLogin => TRUE,
        \WebDevJL\Framework\Enums\AppSettingKeys::CacheTtl => 21600,//6 hours
        \WebDevJL\Framework\Enums\AppSettingKeys::CACHETYPEUSED => "TYPE_APC", //See possible value in constants of Library\Core\Cache\BaseCache.php
    );
  }  
}