<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Helpers;

use Puzzlout\Framework\Helpers\CommonHelper_1;

class CommonHelper_1Test extends \PHPUnit_Framework_TestCase {

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
        $result = new CommonHelper_1($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Helpers\CommonHelper_1', $result);
    }

    //Write the next tests below...
}
