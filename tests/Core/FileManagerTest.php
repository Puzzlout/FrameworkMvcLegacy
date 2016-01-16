<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Core;

use WebDevJL\Framework\Core\FileManager;

class FileManagerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new FileManager($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Core\FileManager', $result);
  }
  
  //Write the next tests below...
  
}