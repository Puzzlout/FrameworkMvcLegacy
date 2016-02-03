<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Enums\ErrorCodes;

use Puzzlout\Framework\Enums\ErrorCodes\FrameworkController;

class FrameworkControllerTest extends \PHPUnit_Framework_TestCase {

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
        $result = new FrameworkController($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Enums\ErrorCodes\FrameworkController', $result);
    }

    //Write the next tests below...
}
