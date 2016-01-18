<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Core\Cache;

use WebDevJL\Framework\Core\Cache\BaseCache;

class BaseCacheTest extends \PHPUnit_Framework_TestCase {

  protected $app;

  /**
   * Initialize the app object.
   */
  protected function setUp()
  {
      $this->app = new \WebDevJL\Framework\Tests\TestApplication();
  }
  
  /**
   * This method is generated.
   */
  public function testInstanceIsCorrect()
  {
    $this->assertNotNull($this->app);
    $result = new BaseCache($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Core\Cache\BaseCache', $result);
  }
  
  //Write the next tests below...
  
}