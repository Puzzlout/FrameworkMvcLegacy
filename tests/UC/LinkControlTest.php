<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\UC;

use Puzzlout\Framework\UC\LinkControl;

class LinkControlTest extends \PHPUnit_Framework_TestCase {

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
        $result = new LinkControl($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\UC\LinkControl', $result);
    }

    //Write the next tests below...
}
