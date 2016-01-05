<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Utility;

use WebDevJL\Framework\Utility\Logger;

class LoggerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new Logger();
    $this->assertInstanceOf('WebDevJL\Framework\Utility\Logger', $result);
  }
  
  //Write the next tests below...
  
}