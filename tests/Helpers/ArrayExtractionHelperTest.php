<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Helpers;

use WebDevJL\Framework\Helpers\ArrayExtractionHelper;

class ArrayExtractionHelperTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ArrayExtractionHelper($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Helpers\ArrayExtractionHelper', $result);
    }

    //Write the next tests below...
}
