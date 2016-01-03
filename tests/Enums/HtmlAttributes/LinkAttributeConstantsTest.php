<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Enums\HtmlAttributes;

use WebDevJL\Framework\Enums\HtmlAttributes\LinkAttributeConstants;

class LinkAttributeConstantsTest extends \PHPUnit_Framework_TestCase {

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
    $result = new LinkAttributeConstants();
    $this->assertInstanceOf('WebDevJL\Framework\Enums\HtmlAttributes\LinkAttributeConstants', $result);
  }
  
  //Write the next tests below...
  
}