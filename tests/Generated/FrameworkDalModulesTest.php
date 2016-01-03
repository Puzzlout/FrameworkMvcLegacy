<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Generated;

use WebDevJL\Framework\Generated\FrameworkDalModules;

class FrameworkDalModulesTest extends \PHPUnit_Framework_TestCase {

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
    $result = new FrameworkDalModules();
    $this->assertInstanceOf('WebDevJL\Framework\Generated\FrameworkDalModules', $result);
  }
  
  //Write the next tests below...
  
}