<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Dal;

use WebDevJL\Framework\Dal\PDOFactory;

class PDOFactoryTest extends \PHPUnit_Framework_TestCase {

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
    $result = new PDOFactory();
    $this->assertInstanceOf('WebDevJL\Framework\Dal\PDOFactory', $result);
  }
  
  //Write the next tests below...
  
}