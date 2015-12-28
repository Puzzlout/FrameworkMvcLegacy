<?php

/**
 * Test class for LinkControl.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package LinkControlTest
 */

use WebDevJL\Framework\BO\F_account;

class F_accountTest extends PHPUnit_Framework_TestCase {
    public function testInstanciation() {
        $result = new F_account();
        $this->assertInstanceOf('\WebDevJL\Framework\BO\F_account', $result);
    }
}