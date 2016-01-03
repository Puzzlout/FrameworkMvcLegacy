<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Enums;

use WebDevJL\Framework\Enums\UrlKeys;

class UrlKeysTest extends \PHPUnit_Framework_TestCase {

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
    $result = new UrlKeys();
    $this->assertInstanceOf('WebDevJL\Framework\Enums\UrlKeys', $result);
  }
  
  //Write the next tests below...
  
}