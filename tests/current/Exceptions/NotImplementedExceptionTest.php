<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Exceptions;

use WebDevJL\Framework\Exceptions\NotImplementedException;

class NotImplementedExceptionTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->app = new \WebDevJL\Framework\Tests\TestApplication();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $this->assertNotNull($this->app);
        $result = new NotImplementedException();
        $this->assertInstanceOf('WebDevJL\Framework\Exceptions\NotImplementedException', $result);
    }

    //Write the next tests below...
}
