<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\ViewModels;

use Puzzlout\Framework\ViewModels\HttpErrorVm;

class HttpErrorVmTest extends \PHPUnit_Framework_TestCase {

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
        $result = new HttpErrorVm($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\ViewModels\HttpErrorVm', $result);
    }

    //Write the next tests below...
}
