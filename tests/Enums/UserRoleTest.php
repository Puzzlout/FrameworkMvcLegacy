<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Enums;

use Puzzlout\Framework\Enums\UserRole;

class UserRoleTest extends \PHPUnit_Framework_TestCase {

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
        $result = new UserRole($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Enums\UserRole', $result);
    }

    //Write the next tests below...
}
