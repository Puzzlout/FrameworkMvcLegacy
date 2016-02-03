<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Exceptions;

use Puzzlout\Framework\Exceptions\NotImplementedException;

class NotImplementedExceptionTest extends \PHPUnit_Framework_TestCase {

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
        $result = new NotImplementedException();
        $this->assertInstanceOf('Puzzlout\Framework\Exceptions\NotImplementedException', $result);
    }

    //Write the next tests below...
}
