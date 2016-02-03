<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Core;

use Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase;

class ConstantsClassGeneratorBaseTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ConstantsClassGeneratorBase($this->app, [], []);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Core\ConstantsClassGeneratorBase', $result);
    }

    //Write the next tests below...
}
