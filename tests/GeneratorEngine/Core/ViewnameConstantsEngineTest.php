<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Core;

use WebDevJL\Framework\GeneratorEngine\Core\ViewnameConstantsEngine;

class ViewnameConstantsEngineTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ViewnameConstantsEngine($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Core\ViewnameConstantsEngine', $result);
    }

    //Write the next tests below...
}
