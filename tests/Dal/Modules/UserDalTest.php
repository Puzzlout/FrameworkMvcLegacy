<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Dal\Modules;

use Puzzlout\Framework\Dal\Modules\UserDal;
use Puzzlout\Framework\Dal\DbQueryFilters;

class UserDalTest extends \PHPUnit_Framework_TestCase {

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
        $result = new UserDal(null, new DbQueryFilters());
        $this->assertInstanceOf('Puzzlout\Framework\Dal\Modules\UserDal', $result);
    }

    //Write the next tests below...
}
