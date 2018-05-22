<?php

namespace Simpliste\Log;

use Psr\Log\LoggerAwareInterface as PsrLoggerAwareInterface;
use Psr\Log\LoggerInterface;

/**
 * Interface LoggerAwareInterface
 *
 * @package Simpliste\Log
 */
interface LoggerAwareInterface extends PsrLoggerAwareInterface
{
    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;
}