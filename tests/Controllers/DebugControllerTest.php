<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Controllers;

use WebDevJL\Framework\Controllers\DebugController;

class DebugControllerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new DebugController($this->app, "Test", "Test");
    $this->assertInstanceOf('WebDevJL\Framework\Controllers\DebugController', $result);
  }
  
  //Write the next tests below...
  
}