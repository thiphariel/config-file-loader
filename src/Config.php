<?php

namespace Config;

use Config\Exception\FileNotFoundException;
use Config\Exception\UnsupportedFormatException;
use Config\Parser\JSONParser;

class Config
{
    /**
     * @var array
     */
    private $data;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * Load the file data as an array.
     *
     * @param string $path
     * @throws UnsupportedFormatException
     */
    public function load(string $path): void
    {
        $path = $this->validPath($path);

        $info = pathinfo($path);
        $extension = $info['extension'] ?? '';
        $parser = new JSONParser();

        if (!in_array($extension, $parser->extension())) {
            throw new UnsupportedFormatException("Unsupported format. Only JSON files are supported");
        }

        $this->data = $parser->parse($path);
    }

    /**
     * Retrieve data for the give key.
     *
     * @param string $key
     * @return array|string
     */
    public function get(string $key)
    {
        $nested = explode('.', $key);
        $base = $this->data;

        foreach ($nested as $part) {
            if (isset($base[$part])) {
                $base = $base[$part];
                continue;
            }
        }

        return $base;
    }

    /**
     * Try if the given file path exists
     *
     * @param string $path
     * @return string
     * @throws FileNotFoundException
     */
    private function validPath(string $path): string
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException("Config file: [$path] cannot be found");
        }

        return $path;
    }
}
