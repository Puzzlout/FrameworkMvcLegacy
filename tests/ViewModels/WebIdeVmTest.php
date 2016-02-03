<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\ViewModels;

use Puzzlout\Framework\ViewModels\WebIdeVm;

class WebIdeVmTest extends \PHPUnit_Framework_TestCase {

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
        $result = new WebIdeVm($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\ViewModels\WebIdeVm', $result);
    }

    //Write the next tests below...
}
