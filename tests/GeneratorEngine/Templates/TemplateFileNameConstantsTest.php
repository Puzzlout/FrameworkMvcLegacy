<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\Templates;

use Puzzlout\Framework\GeneratorEngine\Templates\TemplateFileNameConstants;

class TemplateFileNameConstantsTest extends \PHPUnit_Framework_TestCase {

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
        $result = new TemplateFileNameConstants($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\Templates\TemplateFileNameConstants', $result);
    }

    //Write the next tests below...
}
