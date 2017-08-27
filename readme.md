# Config file loader

[![Build Status](https://img.shields.io/travis/thiphariel/config-file-loader/master.svg)](https://travis-ci.org/thiphariel/config-file-loader)
[![Coverage Status](https://img.shields.io/coveralls/thiphariel/config-file-loader.svg)](https://coveralls.io/github/thiphariel/config-file-loader?branch=master)
[![Downloads](https://img.shields.io/packagist/dt/thiphariel/config-file-loader.svg)](https://packagist.org/packages/thiphariel/config-file-loader)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/thiphariel/config-file-loader/master/license)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/a9020ecb-245f-41c3-8862-0e439e2a0aa2/big.png)](https://insight.sensiolabs.com/projects/a9020ecb-245f-41c3-8862-0e439e2a0aa2)

This library is a configuration file loader in PHP that supports JSON and PHP files at the moment.

## Requierements

* PHP >=7.1

## Installation

```
composer require thiphariel/config-file-loader
```

## Usage

```php
// Create an instance of Config
$config = new Config();

// Load JSON configuration file
$config->load("config.json");

// Load PHP configuration file
$config->load("config.php");

// Getting values
$host = $config->get("host");
$port = $config->get("port");

// Nested keys
$env = $config->get("environment.dev");
```

Examples of configurations can be found in the `tests/config` folder.
