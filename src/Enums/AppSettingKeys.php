<?php

/**
 * Lists the constants of the Applications settings keys that are common to all
 * applications. 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package AppSettingKeys
 */

namespace WebDevJL\Framework\Enums;

abstract class AppSettingKeys {
  /**
   * Application mode defines DEV or LIVE mode. 
   */

  const APP_MODE = "ApplicationMode";
  /**
   * Default culture of the application. 
   */
  const DEFAULT_CULTURE = "DefaultCulture";
  /**
   * ApplicationBaseUrl value when the WebApp is not at the root of the public 
   * directory but when it is "publicRoot/MySite".<br />
   * When the url is http://mydomain.net/, the BaseUrl value is "/".<br />
   * When the url is http://mydomain.net/MySite, the BaseUrl value 
   * is "/MySite/".<br />
   */
  const APP_BASE_URL = "ApplicationBaseUrl";
  /**
   * Default url to load.
   */
  const APP_DEFAULT_ROUTE = "DefaultUrl";
  /**
   * Path to the images in the project. 
   */
  const ROOT_IMAGE_FOLDER_PATH = "RootImageFolderPath";
  /**
   * Path to the uploaded files in the project. 
   */
  const ROOT_DOC_UPLOAD_PATH = "RootDocumentUpload";
  /**
   * Path to the Dal classes of the Application. 
   */
  const APP_DAL_FOLDER_PATH = "ApplicationsDalFolderPath";
  /**
   * Host used for the MySQL connection. 
   */
  const MYSQL_HOST = "Myslq_host";
  /**
   * User used for the MySQL connection. 
   */
  const MYSL_USER = "Mysql_user";
  /**
   * User's password used for the MySQL connection. 
   */
  const MYSQL_PWD = "Mysql_pwd";
  /**
   * Target database used for the MySQL connection. 
   */
  const MYSQL_DB_NAME = "Mysql_db_name";
  /**
   * Default lattitude Coordinates to center Google Maps. 
   */
  const GMAPS_DEFAULT_LAT = "GoogleMapsCenterLat";
  /**
   * Default longitude Coordinates to center Google Maps. 
   */
  const GMAPS_DEFAULT_LNG = "GoogleMapsCenterLng";
  /**
   * Default icon image path when a marker has no lattitude and longitude
   * in Google Maps. 
   */
  const GMAPS_NO_COORD_ICON = "GoogleMapsNoLatLngIcon";
  /**
   * Default domain to use in build email addresses. 
   */
  const DEFAULT_EMAIL_DOMAIN = "DefaultEmailDomainValue";
  /**
   * Method using to log error. 
   * @see /Library/Enums/ErrorLoggingMethod.php
   */
  const ERROR_LOG_METHOD = "ErrorLoggingMethod";
  /**
   * Public encryption key to use mcrypt. 
   * @see /Library/Security/Protect .php
   */
  const ENCRYPTION_KEY = "EncryptionKey";
  /**
   * Public static salt value used to hash user passwords. 
   * @see /Library/Security/Protect .php
   */
  const PASSWORD_SALT = "PasswordSalt";
  /**
   * File name of the brand image
   */
  const BRAND_IMAGE_URL = "LogoImageUrl";

  /**
   * Boolean value to use when changing password at first line
   */
  const USE_EMAIL_LINK_1ST_LOGIN = "UseEmailLinkForFirstLogin";
  
  /**
   * Time to Live in seconds for the cache values (default value) 
   */
  const CACHE_TTL = "CacheTtl";
  
  /**
   * The class partial name of the cache to use
   */
  const CACHE_TYPE = "CacheTypeUsed";
}
