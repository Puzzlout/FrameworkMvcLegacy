<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Dal;

use WebDevJL\Framework\Dal\BaseManager;
use WebDevJL\Framework\Dal\DbQueryFilters;

class BaseManagerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new BaseManager(null, new DbQueryFilters());
    $this->assertInstanceOf('WebDevJL\Framework\Dal\BaseManager', $result);
  }
  
  //Write the next tests below...
  
}