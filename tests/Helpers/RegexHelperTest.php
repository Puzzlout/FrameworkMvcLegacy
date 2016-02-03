<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Helpers;

use Puzzlout\Framework\Helpers\RegexHelper;

class RegexHelperTest extends \PHPUnit_Framework_TestCase {

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
        $result = new RegexHelper($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Helpers\RegexHelper', $result);
    }

    //Write the next tests below...
}
