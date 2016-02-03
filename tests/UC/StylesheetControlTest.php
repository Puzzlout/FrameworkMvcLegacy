<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\UC;

use Puzzlout\Framework\UC\StylesheetControl;

class StylesheetControlTest extends \PHPUnit_Framework_TestCase {

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
        $result = new StylesheetControl($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\UC\StylesheetControl', $result);
    }

    //Write the next tests below...
}
