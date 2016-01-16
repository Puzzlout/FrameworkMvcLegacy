<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Helpers;

use WebDevJL\Framework\Helpers\HtmlControlBuildHelper;

class HtmlControlBuildHelperTest extends \PHPUnit_Framework_TestCase {

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
    $result = new HtmlControlBuildHelper($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Helpers\HtmlControlBuildHelper', $result);
  }
  
  //Write the next tests below...
  
}