<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Security;

use WebDevJL\Framework\Security\AuthenticationManager;

class AuthenticationManagerTest extends \PHPUnit_Framework_TestCase {

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
    $result = new AuthenticationManager();
    $this->assertInstanceOf('WebDevJL\Framework\Security\AuthenticationManager', $result);
  }
  
  //Write the next tests below...
  
}