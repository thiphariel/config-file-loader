<?php
/**
 * Created by PhpStorm.
 * User: thiphariel
 * Date: 27/08/17
 * Time: 12:06
 */

namespace Config\Parser;

class PHPParser implements ParserInterface
{
    /**
     * Parse the data
     *
     * @param string $path
     * @return array
     */
    public function parse(string $path): array
    {
        return require "$path";
    }
}
