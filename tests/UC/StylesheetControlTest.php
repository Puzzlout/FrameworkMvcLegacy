<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\UC;

use WebDevJL\Framework\UC\StylesheetControl;

class StylesheetControlTest extends \PHPUnit_Framework_TestCase {

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
        $result = new StylesheetControl($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\UC\StylesheetControl', $result);
    }

    //Write the next tests below...
}
