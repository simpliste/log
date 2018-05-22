simpliste/log
=============

[![Build Status](https://travis-ci.org/simpliste/log.svg?branch=master)](https://travis-ci.org/simpliste/log)
[![Code Coverage](https://codecov.io/gh/simpliste/log/branch/master/graph/badge.svg)](https://codecov.io/gh/simpliste/log)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/simpliste/log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/simpliste/log/?branch=master)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

> LoggerAwareTrait implementation of the LoggerAwareInterface.

With the LoggerAwareTrait you can use log functions without knowing or the logger is set. When the logger is not set a NullLogger is returned so that the code does not break. 

Installation
------------

You can install simpliste log through [Composer](https://getcomposer.org):

```shell
$ composer require simpliste/log
```

You can combine this LoggerAwareTrait with anything that implements the Psr\Log\LoggerInterface. For example Monolog can be used.

```shell
$ composer require monolog/monolog
```

Usage
-----

```php
<?php

use Monolog\Handler\Handler\StreamHandler;
use Monolog\Logger;
use Simpliste\Log\LoggerAwareTrait;
use Simpliste\Log\LoggerAwareInterface;

class Whoops implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    
    public function run()
    {
        $this->getLogger()->info('Started running');
    }
}

echo 'Example without a logger set';
$whoops = new Whoops();
$whoops->run();

$logger = new Logger();
$logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));

echo 'Example with a logger set';
$whoopsWithLogger = new Whoops();
$whoopsWithLogger->setLogger($logger);

```

<b>The above example will output:</b>

Example without an logger set<br>
Example with an logger set<br>
Started running