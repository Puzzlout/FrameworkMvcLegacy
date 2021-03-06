<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\BO;

use Puzzlout\Framework\BO\F_common_resource;

class F_common_resourceTest extends \PHPUnit_Framework_TestCase {

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
        $result = new F_common_resource([]);
        $this->assertInstanceOf('Puzzlout\Framework\BO\F_common_resource', $result);
    }

    //Write the next tests below...
}
