<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Dal\Modules;

use Puzzlout\Framework\Dal\Modules\DocumentDal;
use Puzzlout\Framework\Dal\DbQueryFilters;

class DocumentDalTest extends \PHPUnit_Framework_TestCase {

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
        $result = new DocumentDal(null, new DbQueryFilters());
        $this->assertInstanceOf('Puzzlout\Framework\Dal\Modules\DocumentDal', $result);
    }

    //Write the next tests below...
}
