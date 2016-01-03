<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Utility;

use WebDevJL\Framework\GeneratorEngine\Utility\ResourceEngine;

class ResourceEngineTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ResourceEngine();
    $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Utility\ResourceEngine', $result);
  }
  
  //Write the next tests below...
  
}