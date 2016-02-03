<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\UC;

use Puzzlout\Framework\UC\LeftMenu;

class LeftMenuTest extends \PHPUnit_Framework_TestCase {

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
        $result = new LeftMenu($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\UC\LeftMenu', $result);
    }

    //Write the next tests below...
}
