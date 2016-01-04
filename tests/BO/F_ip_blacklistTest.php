<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\BO;

use WebDevJL\Framework\BO\F_ip_blacklist;

class F_ip_blacklistTest extends \PHPUnit_Framework_TestCase {

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
    $result = new F_ip_blacklist();
    $this->assertInstanceOf('WebDevJL\Framework\BO\F_ip_blacklist', $result);
  }
  
  //Write the next tests below...
  
}