<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Utility;

use Puzzlout\Framework\GeneratorEngine\Utility\ResourceEngine;

class ResourceEngineTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ResourceEngine($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Utility\ResourceEngine', $result);
    }

    //Write the next tests below...
}
