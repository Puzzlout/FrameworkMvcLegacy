<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Dal\Modules;

use WebDevJL\Framework\Dal\Modules\DocumentDal;
use WebDevJL\Framework\Dal\DbQueryFilters;

class DocumentDalTest extends \PHPUnit_Framework_TestCase {

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
    $result = new DocumentDal(null, new DbQueryFilters());
    $this->assertInstanceOf('WebDevJL\Framework\Dal\Modules\DocumentDal', $result);
  }
  
  //Write the next tests below...
  
}