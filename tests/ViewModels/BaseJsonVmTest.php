<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\ViewModels;

use WebDevJL\Framework\ViewModels\BaseJsonVm;

class BaseJsonVmTest extends \PHPUnit_Framework_TestCase {

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
    $result = new BaseJsonVm();
    $this->assertInstanceOf('WebDevJL\Framework\ViewModels\BaseJsonVm', $result);
  }
  
  //Write the next tests below...
  
}