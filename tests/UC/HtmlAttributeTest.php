<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\UC;

use Puzzlout\Framework\UC\HtmlAttribute;

class HtmlAttributeTest extends \PHPUnit_Framework_TestCase {

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
        $result = new HtmlAttribute("", "");
        $this->assertInstanceOf('Puzzlout\Framework\UC\HtmlAttribute', $result);
    }

    //Write the next tests below...
}
