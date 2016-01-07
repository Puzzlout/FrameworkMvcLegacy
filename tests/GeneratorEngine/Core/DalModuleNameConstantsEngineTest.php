<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Core;

use WebDevJL\Framework\GeneratorEngine\Core\DalModuleNameConstantsEngine;

class DalModuleNameConstantsEngineTest extends \PHPUnit_Framework_TestCase {

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
    $result = new DalModuleNameConstantsEngine($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Core\DalModuleNameConstantsEngine', $result);
  }
  
  //Write the next tests below...
  
}