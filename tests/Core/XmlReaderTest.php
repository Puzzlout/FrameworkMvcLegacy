<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Core;

use Puzzlout\Framework\Core\XmlReader;

class XmlReaderTest extends \PHPUnit_Framework_TestCase {

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
        $result = new XmlReader();
        $this->assertInstanceOf('Puzzlout\Framework\Core\XmlReader', $result);
    }

    //Write the next tests below...
}
