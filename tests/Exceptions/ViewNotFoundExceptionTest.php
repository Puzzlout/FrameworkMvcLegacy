<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Exceptions;

use WebDevJL\Framework\Exceptions\ViewNotFoundException;

class ViewNotFoundExceptionTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ViewNotFoundException();
        $this->assertInstanceOf('WebDevJL\Framework\Exceptions\ViewNotFoundException', $result);
    }

    //Write the next tests below...
}
