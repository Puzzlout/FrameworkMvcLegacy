<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Dal;

use Puzzlout\Framework\Dal\DbStatementConfig;

class DbStatementConfigTest extends \PHPUnit_Framework_TestCase {

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
        $result = new DbStatementConfig(null, "", new \Puzzlout\Framework\Dal\DbQueryFilters());
        $this->assertInstanceOf('Puzzlout\Framework\Dal\DbStatementConfig', $result);
    }

    //Write the next tests below...
}
