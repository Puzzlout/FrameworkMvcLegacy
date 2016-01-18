<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Enums;

use WebDevJL\Framework\Enums\ErrorLoggingMethod;

class ErrorLoggingMethodTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ErrorLoggingMethod($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Enums\ErrorLoggingMethod', $result);
  }
  
  //Write the next tests below...
  
}