<?php
/**
 * Created by PhpStorm.
 * User: thiphariel
 * Date: 26/08/2017
 * Time: 17:36
 */
namespace Tests;

use Config\Config;
use Config\Exception\FileNotFoundException;
use Config\Exception\ParseException;
use Config\Exception\UnsupportedFormatException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    private $config;

    protected function setUp()
    {
        $this->config = new Config();
    }

    /**
     * Test the instance
     */
    public function testConfigConstructor()
    {
        $this->assertInstanceOf(Config::class, $this->config);
    }

    /**
     * Test if an exception is raised when we give an incorrect file
     */
    public function testLoadIncorrectConfigFile()
    {
        $this->expectException(FileNotFoundException::class);
        $this->config->load("not_exists.json");
    }

    /**
     * Test if an exception is raised when the file is not a JSON file
     */
    public function testUnsupportedFormatFile()
    {
        $this->expectException(UnsupportedFormatException::class);
        $this->config->load("tests/config/bad_extension");
    }

    /**
     * Test if an exception is raised if the file is malformed
     */
    public function testMalformedFile()
    {
        $this->expectException(ParseException::class);
        $this->config->load("tests/config/malformed.json");
    }

    /**
     * Test if we retrieve the correct value for a key
     */
    public function testRetrieveCorrectValueFromKey()
    {
        $this->config->load("tests/config/config.json");
        $this->assertEquals("dev", $this->config->get("env"));

        $this->config->load("tests/config/config.php");
        $this->assertEquals("dev", $this->config->get("env"));
    }

    /**
     * Test if we retrieve the correct value for a nested key
     */
    public function testRetrieveCorrectValueFromNestedKey()
    {
        $this->config->load("tests/config/config.json");
        $this->assertEquals("localhost", $this->config->get("server.host"));

        $this->config->load("tests/config/config.php");
        $this->assertEquals("localhost", $this->config->get("server.host"));
    }
}
