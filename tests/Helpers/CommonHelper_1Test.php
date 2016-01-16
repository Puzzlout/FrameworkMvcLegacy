<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Helpers;

use WebDevJL\Framework\Helpers\CommonHelper_1;

class CommonHelper_1Test extends \PHPUnit_Framework_TestCase {

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
    $result = new CommonHelper_1($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Helpers\CommonHelper_1', $result);
  }
  
  //Write the next tests below...
  
}