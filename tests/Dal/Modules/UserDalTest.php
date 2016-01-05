<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Dal\Modules;

use WebDevJL\Framework\Dal\Modules\UserDal;

class UserDalTest extends \PHPUnit_Framework_TestCase {

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
    $result = new UserDal();
    $this->assertInstanceOf('WebDevJL\Framework\Dal\Modules\UserDal', $result);
  }
  
  //Write the next tests below...
  
}