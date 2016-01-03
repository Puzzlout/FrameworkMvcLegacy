<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Helpers;

use WebDevJL\Framework\Helpers\CommonHelper;

class CommonHelperTest extends \PHPUnit_Framework_TestCase {

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
    $result = new CommonHelper();
    $this->assertInstanceOf('WebDevJL\Framework\Helpers\CommonHelper', $result);
  }
  
  //Write the next tests below...
  
}