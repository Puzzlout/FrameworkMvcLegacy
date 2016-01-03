<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\BO;

use WebDevJL\Framework\BO\F_culture_extension;

class F_culture_extensionTest extends \PHPUnit_Framework_TestCase {

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
    $result = new F_culture_extension();
    $this->assertInstanceOf('WebDevJL\Framework\BO\F_culture_extension', $result);
  }
  
  //Write the next tests below...
  
}