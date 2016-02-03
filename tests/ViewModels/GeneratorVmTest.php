<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\ViewModels;

use Puzzlout\Framework\ViewModels\GeneratorVm;

class GeneratorVmTest extends \PHPUnit_Framework_TestCase {

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
        $result = new GeneratorVm($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\ViewModels\GeneratorVm', $result);
    }

    //Write the next tests below...
}
