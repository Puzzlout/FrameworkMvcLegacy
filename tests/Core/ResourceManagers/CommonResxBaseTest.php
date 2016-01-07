<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core\ResourceManagers;

use WebDevJL\Framework\Core\ResourceManagers\CommonResxBase;

class CommonResxBaseTest extends \PHPUnit_Framework_TestCase {

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
    $result = new CommonResxBase($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Core\ResourceManagers\CommonResxBase', $result);
  }
  
  //Write the next tests below...
  
}