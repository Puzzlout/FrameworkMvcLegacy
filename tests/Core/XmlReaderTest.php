<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core;

use WebDevJL\Framework\Core\XmlReader;

class XmlReaderTest extends \PHPUnit_Framework_TestCase {

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
    $result = new XmlReader($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Core\XmlReader', $result);
  }
  
  //Write the next tests below...
  
}