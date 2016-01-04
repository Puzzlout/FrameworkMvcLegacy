<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core;

use WebDevJL\Framework\Core\Context;

class ContextTest extends \PHPUnit_Framework_TestCase {

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
    $result = new Context();
    $this->assertInstanceOf('WebDevJL\Framework\Core\Context', $result);
  }
  
  //Write the next tests below...
  
}