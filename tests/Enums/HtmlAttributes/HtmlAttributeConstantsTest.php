<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Enums\HtmlAttributes;

use Puzzlout\Framework\Enums\HtmlAttributes\HtmlAttributeConstants;

class HtmlAttributeConstantsTest extends \PHPUnit_Framework_TestCase {

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
        $result = new HtmlAttributeConstants($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Enums\HtmlAttributes\HtmlAttributeConstants', $result);
    }

    //Write the next tests below...
}
