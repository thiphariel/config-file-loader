<?php
/**
 * Created by PhpStorm.
 * User: thiphariel
 * Date: 27/08/17
 * Time: 12:06
 */

namespace Config\Parser;

use Config\Exception\ParseException;

class PHPParser implements ParserInterface
{
    /**
     * Parse the data
     *
     * @param string $path
     * @return array
     * @throws ParseException
     */
    public function parse(string $path): array
    {
        return require "$path";
    }
}
