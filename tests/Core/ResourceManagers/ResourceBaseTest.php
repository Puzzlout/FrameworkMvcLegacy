<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core\ResourceManagers;

use WebDevJL\Framework\Core\ResourceManagers\ResourceBase;

class ResourceBaseTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ResourceBase();
    $this->assertInstanceOf('WebDevJL\Framework\Core\ResourceManagers\ResourceBase', $result);
  }
  
  //Write the next tests below...
  
}