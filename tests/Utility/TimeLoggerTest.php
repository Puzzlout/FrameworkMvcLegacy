<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Utility;

use Puzzlout\Framework\Utility\TimeLogger;

class TimeLoggerTest extends \PHPUnit_Framework_TestCase {

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
        $result = new TimeLogger($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Utility\TimeLogger', $result);
    }

    //Write the next tests below...
}
