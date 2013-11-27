<?php
namespace tests;

class TestBase32 extends \PHPUnit_Framework_TestCase
{
    public static $testdata = array(
        array('', ''),
        array('Test', 'KRSXG5A='),
        array('1', 'GE======')
    );
    public function testEncode()
    {
        foreach (self::$testdata as $test) {
            $input = $test[0];
            $expected = $test[1];
            $this->assertEquals($expected, \OTPHP\Base32::encode($input));
        }
    }
    public function testDecode()
    {
        foreach (self::$testdata as $test) {
            $expected = $test[0];
            $input = $test[1];
            $binary_string = \OTPHP\Base32::decode($input);
            $regular_string = trim($binary_string);
            $this->assertEquals($expected, $regular_string);
        }
    }
}
