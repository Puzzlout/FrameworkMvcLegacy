<?php

/**
 * A class manager when using APC caching
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ApcCacher
 */

namespace WebDevJL\Framework\Core\Cache;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class BaseCache implements \WebDevJL\Framework\Interfaces\ICache {

  /**
   * Member value is pass on to the specific cache used in the context. The TTL
   * value is extracted from the config in the case setting a value in the cache
   * store.
   * 
   * @var \WebDevJL\Framework\Core\Config 
   */
  protected $config;
  
  /**
   * For each method of the contract, a switch is use to instanciate the proper
   * caching class to handle the request. 
   * 
   * @var int 
   * @see \WebDevJL\Framework\Interfaces\ICache
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
   * @param \WebDevJL\Framework\Core\Config $config
   */
  public function __construct(\WebDevJL\Framework\Core\Config $config) {
    $typeOfCache = $config->Get(\WebDevJL\Framework\Enums\AppSettingKeys::CACHETYPEUSED);
    $this->config = $config;
    $this->cacheType = constant("\WebDevJL\Framework\Core\Cache\BaseCache::$typeOfCache");
  }

  public static function Init(\WebDevJL\Framework\Core\Config $config) {
    $cacher = new BaseCache($config);
    return $cacher;
  }
  /**
   * 
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function IsEnabled() {
    $result = FALSE;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = extension_loaded('apc') && ini_get('apc.enabled');
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }


  /**
   * 
   * @param type $key
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function KeyExists($key) {
    if(!$this->IsEnabled()) {
      return FALSE;
    }
    
    $result = FALSE;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = ApcCache::Init($this->config)->KeyExists($key);
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }

  /**
   * 
   * @param type $key
   * @param type $value
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function Create($key, $value) {
    if(!$this->IsEnabled()) {
      return FALSE;
    }
    
    $result = FALSE;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = ApcCache::Init($this->config)->Create($key, $value);
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }

  /**
   * 
   * @param type $key
   * @param type $default
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function Read($key, $default) {
    if(!$this->IsEnabled()) {
      return $default;
    }
    
    $result = $default;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = ApcCache::Init($this->config)->Read($key, $default);
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }

  /**
   * 
   * @param type $key
   * @param type $value
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function Update($key, $value) {
    if(!$this->IsEnabled()) {
      return FALSE;
    }
    
    $result = FALSE;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = ApcCache::Init($this->config)->Update($key, $value);
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }

  /**
   * 
   * @param string $key
   * @throws \WebDevJL\Framework\Exceptions\NotImplementedException
   */
  public function Remove($key) {
    if(!$this->IsEnabled()) {
      return FALSE;
    }
    
    $result = FALSE;
    switch ($this->cacheType) {
      case BaseCache::TYPE_APC:
        $result = ApcCache::Init($this->config)->Remove($key);
        break;
      default:
        throw new \WebDevJL\Framework\Exceptions\NotImplementedException();
    }
    return $result;
  }

}
