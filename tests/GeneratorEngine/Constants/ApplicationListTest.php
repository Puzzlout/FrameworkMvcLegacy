<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\GeneratorEngine\Constants;

use WebDevJL\Framework\GeneratorEngine\Constants\ApplicationList;

class ApplicationListTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ApplicationList($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Constants\ApplicationList', $result);
    }

    //Write the next tests below...
}
