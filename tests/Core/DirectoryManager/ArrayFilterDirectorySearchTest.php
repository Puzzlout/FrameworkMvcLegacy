<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core\DirectoryManager;

use WebDevJL\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch;

class ArrayFilterDirectorySearchTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ArrayFilterDirectorySearch();
    $this->assertInstanceOf('WebDevJL\Framework\Core\DirectoryManager\ArrayFilterDirectorySearch', $result);
  }
  
  //Write the next tests below...
  
}