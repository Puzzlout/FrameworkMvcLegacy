<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Utility;

use Puzzlout\Framework\Utility\FileLoader;

class FileLoaderTest extends \PHPUnit_Framework_TestCase {

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
        $result = new FileLoader($this->app, []);
        $this->assertInstanceOf('Puzzlout\Framework\Utility\FileLoader', $result);
    }

    //Write the next tests below...
}
