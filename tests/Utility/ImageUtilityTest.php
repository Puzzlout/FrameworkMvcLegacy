<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Utility;

use WebDevJL\Framework\Utility\ImageUtility;

class ImageUtilityTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ImageUtility($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Utility\ImageUtility', $result);
    }

    //Write the next tests below...
}
