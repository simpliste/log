<?php

namespace Simpliste\Log\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Simpliste\Log\LoggerAwareTrait;

/**
 * Class LoggerAwareTraitTest
 *
 * @package Simpliste\Log\Tests
 */
class LoggerAwareTraitTest extends TestCase
{
    /**
     * Test get logger
     *
     * @return void
     */
    public function testGetLogger(): void
    {
        /** @var LoggerInterface $loggerMock */
        $loggerMock = $this->getMockBuilder(LoggerInterface::class)->getMock();

        /** @var LoggerAwareTrait $loggerAwareMock */
        $loggerAwareMock = $this->getMockForTrait(LoggerAwareTrait::class);

        // Test default logger
        $this->assertNotNull($loggerAwareMock->getLogger());
        $this->assertInstanceOf(LoggerInterface::class, $loggerAwareMock->getLogger());

        // Test overwritten logger
        $loggerAwareMock->setLogger($loggerMock);

        $this->assertNotNull($loggerAwareMock->getLogger());
        $this->assertInstanceOf(LoggerInterface::class, $loggerAwareMock->getLogger());
        $this->assertSame($loggerMock, $loggerAwareMock->getLogger());
    }
}