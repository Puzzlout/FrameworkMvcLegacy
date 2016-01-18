<?php

/**
 * Provides the methods to hash, encrypt and decrypt a value. 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package Protect 
 */

namespace WebDevJL\Framework\Security;

class Protect extends \WebDevJL\Framework\Core\ApplicationComponent {

    private $hashSalt = null;
    private $encryptionKey = null;
    private $iv = null;

    const ENCRYPTION_TYPE = MCRYPT_RIJNDAEL_128;
    const ENCRYPTION_MODE = MCRYPT_MODE_CBC;

    public function __construct(\WebDevJL\Framework\Core\Application $app) {
        parent::__construct($app);
    }

    public static function Init(\WebDevJL\Framework\Core\Application $app) {
        $instance = new Protect($app);
        return $instance;
    }

    public function SetEncryption() {
        $this->iv = mcrypt_create_iv(mcrypt_get_iv_size(self::ENCRYPTION_TYPE, self::ENCRYPTION_MODE), MCRYPT_DEV_URANDOM);
        $this->encryptionKey = strrev(Config::Init($this->app)->Get(\WebDevJL\Framework\Enums\AppSettingKeys::EncryptionKey));
        $this->hashSalt = strrev(Config::Init($this->app)->Get(\WebDevJL\Framework\Enums\AppSettingKeys::PasswordSalt));
        return $this;
    }

    /**
     * Hash some data using Sha1 method with the encryption key.
     * A dynamic salt generated at the request is used to create the hash.  
     * 
     * @param string $dynamicSalt
     * The value is stored in the Applications/CurrentApp/Config/appsettings.xml
     * @param string $data
     * The value to hash using sha1 method and the $publicKey. 
     * @return string
     */
    public function HashValue($dynamicSalt, $data, $hashLength = NULL) {
        $separator = "$%*{//}*%$";
        return
                is_null($hashLength) && is_int($hashLength) ?
                substr(sha1($this->hashSalt . $separator . $dynamicSalt . $separator . $data), 0, $hashLength) :
                sha1($this->hashSalt . $separator . $dynamicSalt . $separator . $data);
    }

    /**
     * Encrypt a string using the MCRYPT_RIJNDAEL_128 encryption and 
     * MCRYPT_MODE_CBC and encode the result in a base64 string so it can be stored
     * in a database or file without the hassle of encoding. 
     * 
     * @param string $noncryptedData
     * The string to encrypt. 
     * @return string
     * The encrypted string encoded in base64 to allow safe storage. 
     */
    public function Encrypt($noncryptedData) {
        $encrypted = mcrypt_encrypt(
                $this->encryptionType, $this->encryptionKey, $noncryptedData, $this->encryptionMode, $this->iv);
        $encoded = base64_encode($encrypted);
        return $encoded;
    }

    /**
     * Decrypt a encoded base64 string using the MCRYPT_RIJNDAEL_128 encryption and 
     * MCRYPT_MODE_CBC 
     * 
     * @param type $encryptedData
     * The base64 encoded string to decrypt. 
     * @return string
     * The decrypted string. 
     */
    public function Decrypt($encryptedData) {
        $decoded = base64_decode($encryptedData, true);
        $decrypted = mcrypt_decrypt($this->encryptionType, $this->encryptionKey, $decoded, $this->encryptionMode, $this->iv);
        return $decrypted;
    }

}
