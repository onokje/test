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
     * @param $length
     * @param $trailing
     * @param $output
     */
    public function testExcerpt($input, $output, $length = 25, $trailing = '…')
    {
        $utils = new DwdUtils();

        $result1 = $utils::excerpt($input, $length, $trailing);
        $this->assertEquals($result1, $output);
    }

    public function provider()
    {
        return array(
            "Most basic test with short string" => array("test input", "test input"),
            "Basic test with long string" => array("test input, but now a lot longer", "test input, but now a…"),
            "testing length parameter" => array("test input, but now a lot longer", "test…", 5),
            "testing all params1" => array("test input, but now a lot longer again", "test...", 5, "..."),
            "testing all params2" => array("test input, but now a lot longer again", "testWAZAAAA!", 5, "WAZAAAA!"),
        );
    }
}
