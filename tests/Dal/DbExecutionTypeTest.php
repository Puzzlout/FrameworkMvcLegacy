<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Dal;

use Puzzlout\Framework\Dal\DbExecutionType;

class DbExecutionTypeTest extends \PHPUnit_Framework_TestCase {

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
        $result = new DbExecutionType($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Dal\DbExecutionType', $result);
    }

    //Write the next tests below...
}
