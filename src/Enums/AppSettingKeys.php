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
  
  const APP_ROOT_DIR = "ApplicationRootDir";
  /**
   * Application mode defines DEV or LIVE mode. 
   */
  const ApplicationMode = "ApplicationMode";
  /**
   * Default culture of the application. 
   */
  const DefaultCulture = "DefaultCulture";
  /**
   * ApplicationBaseUrl value when the WebApp is not at the root of the public 
   * directory but when it is "publicRoot/MySite".<br />
   * When the url is http://mydomain.net/, the BaseUrl value is "/".<br />
   * When the url is http://mydomain.net/MySite, the BaseUrl value 
   * is "/MySite/".<br />
   */
  const ApplicationBaseUrl = "ApplicationBaseUrl";
  /**
   * Default url to load.
   */
  const DefaultUrl = "DefaultUrl";
  /**
   * Path to the images in the project. 
   */
  const RootImageFolderPath = "RootImageFolderPath";
  /**
   * Path to the uploaded files in the project. 
   */
  const RootDocumentUpload = "RootDocumentUpload";
  /**
   * Path to the Dal classes of the Application. 
   */
  const ApplicationsDalFolderPath = "ApplicationsDalFolderPath";
  /**
   *Path to the Tooltips definition file. 
   */
  const TooltipsXmlFileName = "TooltipsXmlFileName";
  /**
   * Host used for the MySQL connection. 
   */
  const Myslq_host = "Myslq_host";
  /**
   * User used for the MySQL connection. 
   */
  const Mysql_user = "Mysql_user";
  /**
   * User's password used for the MySQL connection. 
   */
  const Mysql_pwd = "Mysql_pwd";
  /**
   * Target database used for the MySQL connection. 
   */
  const Mysql_db_name = "Mysql_db_name";
  /**
   * Default lattitude Coordinates to center Google Maps. 
   */
  const GoogleMapsCenterLat = "GoogleMapsCenterLat";
  /**
   * Default longitude Coordinates to center Google Maps. 
   */
  const GoogleMapsCenterLng = "GoogleMapsCenterLng";
  /**
   * Default icon image path when a marker has no lattitude and longitude
   * in Google Maps. 
   */
  const GoogleMapsNoLatLngIcon = "GoogleMapsNoLatLngIcon";
  /**
   * Default domain to use in build email addresses. 
   */
  const DefaultEmailDomainValue = "DefaultEmailDomainValue";
  /**
   * Method using to log error. 
   * @see /Library/Enums/ErrorLoggingMethod.php
   */
  const ErrorLoggingMethod = "ErrorLoggingMethod";
  /**
   * Public encryption key to use mcrypt. 
   * @see /Library/Security/Protect .php
   */
  const EncryptionKey = "EncryptionKey";
  /**
   * Public static salt value used to hash user passwords. 
   * @see /Library/Security/Protect .php
   */
  const PasswordSalt = "PasswordSalt";
  /**
   * File name of the brand image
   */
  const LogoImageUrl = "LogoImageUrl";

  /**
   * Boolean value to use when changing password at first line
   */
  const UseEmailLinkForFirstLogin = "UseEmailLinkForFirstLogin";
  
  /**
   * Time to Live in seconds for the cache values (default value) 
   */
  const CacheTtl = "CacheTtl";
  
  /**
   * The class partial name of the cache to use
   */
  const CACHETYPEUSED = "CacheTypeUsed";
}
