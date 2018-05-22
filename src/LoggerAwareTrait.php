<?php

namespace Simpliste\Log;

use Psr\Log\LoggerAwareTrait as PsrLoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Trait LoggerAwareTrait
 *
 * @package Simpliste\Log
 */
trait LoggerAwareTrait
{
    use PsrLoggerAwareTrait;

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }
}