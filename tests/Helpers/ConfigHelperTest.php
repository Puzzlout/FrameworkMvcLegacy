<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Helpers;

use WebDevJL\Framework\Helpers\ConfigHelper;

class ConfigHelperTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ConfigHelper();
    $this->assertInstanceOf('WebDevJL\Framework\Helpers\ConfigHelper', $result);
  }
  
  //Write the next tests below...
  
}