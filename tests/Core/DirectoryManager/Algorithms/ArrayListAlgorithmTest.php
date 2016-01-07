<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core\DirectoryManager\Algorithms;

use WebDevJL\Framework\Core\DirectoryManager\Algorithms\ArrayListAlgorithm;

class ArrayListAlgorithmTest extends \PHPUnit_Framework_TestCase {

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
    $result = new ArrayListAlgorithm($this->app);
    $this->assertInstanceOf('WebDevJL\Framework\Core\DirectoryManager\Algorithms\ArrayListAlgorithm', $result);
  }
  
  //Write the next tests below...
  
}