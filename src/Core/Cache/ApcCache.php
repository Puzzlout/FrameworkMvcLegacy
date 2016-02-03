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

class ApcCache extends \Puzzlout\Framework\Core\ApplicationComponent implements \Puzzlout\Framework\Interfaces\ICache {

    protected $config;

    public function __construct(\Puzzlout\Framework\Core\Application $app) {
        parent::__construct($app);
    }

    public static function Init(\Puzzlout\Framework\Core\Application $app) {
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
     * @todo Create exception and error code
     */
    public function Create($key, $value) {
        $doesKeyExist = $this->KeyExists($key);
        if ($doesKeyExist) {
            throw new \Exception("key is already found the store. You need to use the Update method.", 0, NULL);
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
     * @todo Create exception and error code
     */
    public function Update($key, $value) {
        $doesKeyExist = $this->KeyExists($key);
        if (!$doesKeyExist) {
            throw new \Exception("key is not found the store. You need to use the Create method.", 0, NULL);
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
