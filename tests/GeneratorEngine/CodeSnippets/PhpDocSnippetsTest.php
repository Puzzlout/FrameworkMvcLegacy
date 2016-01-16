<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\CodeSnippets;

use WebDevJL\Framework\GeneratorEngine\CodeSnippets\PhpDocSnippets;

class PhpDocSnippetsTest extends \PHPUnit_Framework_TestCase {

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
    $result = new PhpDocSnippets($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\CodeSnippets\PhpDocSnippets', $result);
  }
  
  //Write the next tests below...
  
}