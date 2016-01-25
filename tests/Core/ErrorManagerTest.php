<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Core;

use WebDevJL\Framework\Core\ErrorManager;

class ErrorManagerTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ErrorManager($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Core\ErrorManager', $result);
    }

    //Write the next tests below...
}
