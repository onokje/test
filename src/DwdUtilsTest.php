<?php

require_once(__DIR__ . '/../src/DwdUtils.php');

/**
 * Created by PhpStorm.
 * User: martin.schimmel
 * Date: 10-2-2016
 * Time: 19:59
 */
class DwdUtilsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     * @param $input
     * @param $expectedOutput
     * @param $expectedOutput2
     * @param int $length
     * @param string $trailing
     * @internal param $output
     */
    public function testExcerpt($input, $expectedOutput, $expectedOutput2, $length = 25, $trailing = '…')
    {
        $utils = new DwdUtils();

        $result1 = $utils::excerpt($input, $length, $trailing);
        $this->assertEquals($expectedOutput, $result1);
        $this->assertNotEquals($expectedOutput2, $result1);
    }

    public function provider()
    {
        return array(
            "Most basic test with short string" => array("test input", "test input", "test input'…'"),
            "Basic test with long string" => array("test input, but now a lot longer", "test input, but now a…", "test input, but now a lot longer"),
            "testing length parameter" => array("test input, but now a lot longer", "test…", "test input, but now a lot longer", 5),
            "testing all params1" => array("test input, but now a lot longer again", "test...", "test input, but now a lot longer again", 5, "..."),
            "testing all params2" => array("test input, but now a lot longer again", "testWAZAAAA!", "test input, but now a lot longer again", 5, "WAZAAAA!"),
        );
    }
}
