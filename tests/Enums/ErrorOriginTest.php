<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Enums;

use Puzzlout\Framework\Enums\ErrorOrigin;

class ErrorOriginTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ErrorOrigin($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Enums\ErrorOrigin', $result);
    }

    //Write the next tests below...
}
