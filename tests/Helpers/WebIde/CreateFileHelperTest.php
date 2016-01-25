<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace WebDevJL\Framework\Tests\Helpers\WebIde;

use WebDevJL\Framework\Helpers\WebIde\CreateFileHelper;

class CreateFileHelperTest extends \PHPUnit_Framework_TestCase {

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
        $result = new CreateFileHelper($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Helpers\WebIde\CreateFileHelper', $result);
    }

    //Write the next tests below...
}
