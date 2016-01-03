<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Exceptions;

use WebDevJL\Framework\Exceptions\ResourceNotFoundException;

class ResourceNotFoundExceptionTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ResourceNotFoundException();
    $this->assertInstanceOf('WebDevJL\Framework\Exceptions\ResourceNotFoundException', $result);
  }
  
  //Write the next tests below...
  
}