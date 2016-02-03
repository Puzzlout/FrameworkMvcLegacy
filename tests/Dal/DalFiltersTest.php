<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Dal;

use Puzzlout\Framework\Dal\DalFilters;

class DalFiltersTest extends \PHPUnit_Framework_TestCase {

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
        $result = new DalFilters($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Dal\DalFilters', $result);
    }

    //Write the next tests below...
}
