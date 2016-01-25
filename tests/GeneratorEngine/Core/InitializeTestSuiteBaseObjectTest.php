<?php

/**
 * @locked
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Core;

use WebDevJL\Framework\GeneratorEngine\Core\InitializeTestSuiteBaseObject;

class InitializeTestSuiteBaseObjectTest extends \PHPUnit_Framework_TestCase {

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
        $result = new InitializeTestSuiteBaseObject([], "", "");
        $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Core\InitializeTestSuiteBaseObject', $result);
    }

    //Write the next tests below...
}
