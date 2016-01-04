<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\ViewModels;

use WebDevJL\Framework\ViewModels\HttpErrorVm;

class HttpErrorVmTest extends \PHPUnit_Framework_TestCase {

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
    $result = new HttpErrorVm();
    $this->assertInstanceOf('WebDevJL\Framework\ViewModels\HttpErrorVm', $result);
  }
  
  //Write the next tests below...
  
}