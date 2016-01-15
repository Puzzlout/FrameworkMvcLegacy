<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Generated;

use WebDevJL\Framework\Generated\FrameworkControllers;

class FrameworkControllersTest extends \PHPUnit_Framework_TestCase {

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
        $result = new FrameworkControllers($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Generated\FrameworkControllers', $result);
    }

    //Write the next tests below...
}
