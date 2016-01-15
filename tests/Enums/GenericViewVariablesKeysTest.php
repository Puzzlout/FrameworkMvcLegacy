<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Enums;

use WebDevJL\Framework\Enums\GenericViewVariablesKeys;

class GenericViewVariablesKeysTest extends \PHPUnit_Framework_TestCase {

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
        $result = new GenericViewVariablesKeys($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Enums\GenericViewVariablesKeys', $result);
    }

    //Write the next tests below...
}
