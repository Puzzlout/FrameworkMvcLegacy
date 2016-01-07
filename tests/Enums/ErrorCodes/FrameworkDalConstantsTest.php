<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Enums\ErrorCodes;

use WebDevJL\Framework\Enums\ErrorCodes\FrameworkDalConstants;

class FrameworkDalConstantsTest extends \PHPUnit_Framework_TestCase {

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
    $result = new FrameworkDalConstants($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Enums\ErrorCodes\FrameworkDalConstants', $result);
  }
  
  //Write the next tests below...
  
}