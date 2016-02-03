<?php

/**
 * A class manager when using APC caching
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ApcCacher
 */

namespace Puzzlout\Framework\Core\Cache;

class BaseCache extends \Puzzlout\Framework\Core\ApplicationComponent implements \Puzzlout\Framework\Interfaces\ICache {

    /**
     * For each method of the contract, a switch is use to instanciate the proper
     * caching class to handle the request. 
     * 
     * @var int 
     * @see \Puzzlout\Framework\Interfaces\ICache
     */
    protected $cacheType;

    /**
     * Use the cache engine APC
     */
    const TYPE_APC = 1;

    /**
     * Use the cache engine MEMCACHED
     */
    const TYPE_MEMCACHE = 2;

    /**
     * @var bool Specify if the cache used is enable.
     */
    public $enabled = false;

    /**
     * Instanciate the class
     * 
     * 
     * @param \Puzzlout\Framework\Core\Application $app
     */
    public function __construct(\Puzzlout\Framework\Core\Application $app) {
        parent::__construct($app);
        $typeOfCache = \Puzzlout\Framework\Core\Config::Init($app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::CACHETYPEUSED);
        $this->cacheType = constant("\Puzzlout\Framework\Core\Cache\BaseCache::$typeOfCache");
    }

    public static function Init(\Puzzlout\Framework\Core\Application $app) {
        $cacher = new BaseCache($app);
        return $cacher;
    }

    /**
     * 
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function IsEnabled() {
        $result = false;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = extension_loaded('apc') && ini_get('apc.enabled');
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

    /**
     * 
     * @param type $key
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function KeyExists($key) {
        if (!$this->IsEnabled()) {
            return false;
        }

        $result = false;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = ApcCache::Init($this->app)->KeyExists($key);
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

    /**
     * 
     * @param type $key
     * @param type $value
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function Create($key, $value) {
        if (!$this->IsEnabled()) {
            return false;
        }

        $result = false;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = ApcCache::Init($this->app)->Create($key, $value);
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

    /**
     * 
     * @param type $key
     * @param type $default
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function Read($key, $default) {
        if (!$this->IsEnabled()) {
            return $default;
        }

        $result = $default;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = ApcCache::Init($this->app)->Read($key, $default);
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

    /**
     * 
     * @param type $key
     * @param type $value
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function Update($key, $value) {
        if (!$this->IsEnabled()) {
            return false;
        }

        $result = false;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = ApcCache::Init($this->app)->Update($key, $value);
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

    /**
     * 
     * @param string $key
     * @throws \Puzzlout\Framework\Exceptions\NotImplementedException
     */
    public function Remove($key) {
        if (!$this->IsEnabled()) {
            return false;
        }

        $result = false;
        switch ($this->cacheType) {
            case BaseCache::TYPE_APC:
                $result = ApcCache::Init($this->app)->Remove($key);
                break;
            default:
                throw new \Puzzlout\Framework\Exceptions\NotImplementedException();
        }
        return $result;
    }

}
