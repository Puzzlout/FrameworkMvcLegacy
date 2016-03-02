<?php

/**
 * A class manager when using APC caching
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ApcCache
 */

namespace Puzzlout\Framework\Core\Cache;

use Puzzlout\Exceptions\Codes;
use Puzzlout\Framework\Core\Application;
use Puzzlout\Framework\Core\ApplicationComponent;
use Puzzlout\Framework\Interfaces\ICache;

class ApcCache extends ApplicationComponent implements ICache {

    protected $config;

    public function __construct(Application $app) {
        parent::__construct($app);
    }

    public static function Init(Application $app) {
        $cacher = new ApcCache($app);
        return $cacher;
    }

    /**
     * @see \Puzzlout\Framework\Interfaces\ICacher
     * @param string $key
     * @return bool
     */
    public function KeyExists($key) {
        $result = apc_exists($key);
        return $result;
    }

    /**
     * 
     * @see \Puzzlout\Framework\Interfaces\ICacher
     * @param string $key
     * @param mixed $value
     * @return bool The result storing $value with $key. If $key is already in the
     * cache, the result is false.
     * @throws \Exception
     */
    public function Create($key, $value) {
        $doesKeyExist = $this->KeyExists($key);
        if ($doesKeyExist) {
            $errMsg = "Key is already found the store. You need to use the Update method.";
            throw new \Exception($errMsg, Codes\CacheErrors::KEY_FOUND_ON_CREATE, null);
        }

        $isValueCached = apc_add($key, $value, \Puzzlout\Framework\Core\Config::Init($this->app)->Get("CacheTtl"));
        return $isValueCached;
    }

    /**
     * @see \Puzzlout\Framework\Interfaces\ICacher
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function Read($key, $default) {
        $doesKeyExist = $this->KeyExists($key);
        if (!$doesKeyExist) {
            //Log that value is not found
            return $default;
        }

        $cachedValue = apc_fetch($key);
        return $cachedValue;
    }

    /**
     * @see \Puzzlout\Framework\Interfaces\ICacher
     * @param string $key
     * @param mixed $value
     * @return bool
     * @throws \Exception
     */
    public function Update($key, $value) {
        $doesKeyExist = $this->KeyExists($key);
        if (!$doesKeyExist) {
            $errMsg = "Key wasn't found in the store. You need to use the Create method.";
            throw new \Exception($errMsg, Codes\CacheErrors::KEY_NOT_FOUND_ON_UPDATE, null);
        }

        $isValueCached = apc_store($key, $value, \Puzzlout\Framework\Core\Config::Init($this->app)->Get("CacheTtl"));
        return $isValueCached;
    }

    public function Remove($key) {
        $isKeyDeleted = apc_delete($key);
        if (!$isKeyDeleted) {
            \Puzzlout\Framework\Helpers\DebugHelper::WriteString("The key $key was not deleted. Did it exist? " . $this->KeyExists($key));
        }
    }

}
