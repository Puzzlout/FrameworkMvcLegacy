<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Generated;

use Puzzlout\Framework\Generated\FrameworkDalModules;

class FrameworkDalModulesTest extends \PHPUnit_Framework_TestCase {

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
        $result = new FrameworkDalModules($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Generated\FrameworkDalModules', $result);
    }

    //Write the next tests below...
}
