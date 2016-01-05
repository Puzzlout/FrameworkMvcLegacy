<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Utility;

use WebDevJL\Framework\Utility\UUID;

class UUIDTest extends \PHPUnit_Framework_TestCase {

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
    $result = new UUID();
    $this->assertInstanceOf('WebDevJL\Framework\Utility\UUID', $result);
  }
  
  //Write the next tests below...
  
}