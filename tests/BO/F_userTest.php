<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\BO;

use WebDevJL\Framework\BO\F_user;

class F_userTest extends \PHPUnit_Framework_TestCase {

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
        $result = new F_user([]);
        $this->assertInstanceOf('WebDevJL\Framework\BO\F_user', $result);
    }

    //Write the next tests below...
}
