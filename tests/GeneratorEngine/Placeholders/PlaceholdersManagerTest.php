<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Placeholders;

use Puzzlout\Framework\GeneratorEngine\Placeholders\PlaceholdersManager;

class PlaceholdersManagerTest extends \PHPUnit_Framework_TestCase {

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
        $result = new PlaceholdersManager($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Placeholders\PlaceholdersManager', $result);
    }

    //Write the next tests below...
}
