<?php

/**
 * @locked
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Core;

use Puzzlout\Framework\GeneratorEngine\Core\InitializeTestSuiteBaseObject;

class InitializeTestSuiteBaseObjectTest extends \PHPUnit_Framework_TestCase {

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
        $result = new InitializeTestSuiteBaseObject([], "", "");
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Core\InitializeTestSuiteBaseObject', $result);
    }

    //Write the next tests below...
}
