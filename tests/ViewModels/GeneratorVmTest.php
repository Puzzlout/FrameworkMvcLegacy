<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\ViewModels;

use WebDevJL\Framework\ViewModels\GeneratorVm;

class GeneratorVmTest extends \PHPUnit_Framework_TestCase {

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
    $result = new GeneratorVm();
    $this->assertInstanceOf('WebDevJL\Framework\ViewModels\GeneratorVm', $result);
  }
  
  //Write the next tests below...
  
}