<?php

namespace Config\Parser;

use Config\Exception\ParseException;

class JSONParser implements ParserInterface
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
        $data = json_decode(file_get_contents($path), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ParseException();
        }

        return $data;
    }
}
