<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Core;

use Puzzlout\Framework\GeneratorEngine\Core\BaseTemplateProcessor;

class BaseTemplateProcessorTest extends \PHPUnit_Framework_TestCase {

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
        $result = new BaseTemplateProcessor($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Core\BaseTemplateProcessor', $result);
    }

    //Write the next tests below...
}
