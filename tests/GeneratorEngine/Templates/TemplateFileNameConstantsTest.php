<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Templates;

use WebDevJL\Framework\GeneratorEngine\Templates\TemplateFileNameConstants;

class TemplateFileNameConstantsTest extends \PHPUnit_Framework_TestCase {

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
    $result = new TemplateFileNameConstants();
    $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Templates\TemplateFileNameConstants', $result);
  }
  
  //Write the next tests below...
  
}