<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Dal;

use Puzzlout\Framework\Dal\BaseManager;
use Puzzlout\Framework\Dal\DbQueryFilters;

class BaseManagerTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->app = new \Puzzlout\Framework\Tests\TestApplication();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $this->assertNotNull($this->app);
        $result = new BaseManager(null, new DbQueryFilters());
        $this->assertInstanceOf('Puzzlout\Framework\Dal\BaseManager', $result);
    }

    //Write the next tests below...
}
