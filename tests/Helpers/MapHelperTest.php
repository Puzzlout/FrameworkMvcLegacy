<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Helpers;

use Puzzlout\Framework\Helpers\MapHelper;

class MapHelperTest extends \PHPUnit_Framework_TestCase {

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
        $result = new MapHelper($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Helpers\MapHelper', $result);
    }

    //Write the next tests below...
}
