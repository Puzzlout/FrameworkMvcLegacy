<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\BO;

use WebDevJL\Framework\BO\F_action;

class F_actionTest extends \PHPUnit_Framework_TestCase {

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
    $result = new F_action($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\BO\F_action', $result);
  }
  
  //Write the next tests below...
  
}