<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Utility;

use WebDevJL\Framework\Utility\DateTimeHelper;

class DateTimeHelperTest extends \PHPUnit_Framework_TestCase {

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
    $result = new DateTimeHelper($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Utility\DateTimeHelper', $result);
  }
  
  //Write the next tests below...
  
}