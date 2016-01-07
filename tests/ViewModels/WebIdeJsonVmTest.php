<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\ViewModels;

use WebDevJL\Framework\ViewModels\WebIdeJsonVm;

class WebIdeJsonVmTest extends \PHPUnit_Framework_TestCase {

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
    $result = new WebIdeJsonVm($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\ViewModels\WebIdeJsonVm', $result);
  }
  
  //Write the next tests below...
  
}