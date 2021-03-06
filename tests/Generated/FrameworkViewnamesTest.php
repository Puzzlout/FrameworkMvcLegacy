<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Generated;

use Puzzlout\Framework\Generated\FrameworkViewnames;

class FrameworkViewnamesTest extends \PHPUnit_Framework_TestCase {

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
        $result = new FrameworkViewnames($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Generated\FrameworkViewnames', $result);
    }

    //Write the next tests below...
}
