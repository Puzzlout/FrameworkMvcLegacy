<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Controllers;

use WebDevJL\Framework\Controllers\FileController;

class FileControllerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new FileController();
    $this->assertInstanceOf('WebDevJL\Framework\Controllers\FileController', $result);
  }
  
  //Write the next tests below...
  
}