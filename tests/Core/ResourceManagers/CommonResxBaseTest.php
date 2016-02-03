<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Core\ResourceManagers;

use Puzzlout\Framework\Core\ResourceManagers\CommonResxBase;

class CommonResxBaseTest extends \PHPUnit_Framework_TestCase {

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
        $result = new CommonResxBase($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Core\ResourceManagers\CommonResxBase', $result);
    }

    //Write the next tests below...
}
