<?php

declare(strict_types=1);

namespace Docker\Tests\Context;

use Docker\Context\Context;
use Docker\Context\ContextBuilder;
use Docker\Tests\TestCase;

class ContextTest extends TestCase
{
    public function testReturnsValidTarStream(): void
    {
        $directory = __DIR__.DIRECTORY_SEPARATOR.'context-test';

        $context = new Context($directory);
        $this->assertIsResource($context->toStream());
    }

    public function testDirectorySetter(): void
    {
        $context = new Context('abc');
        $this->assertSame('abc', $context->getDirectory());
        $context->setDirectory('def');
        $this->assertSame('def', $context->getDirectory());
    }

    public function testRemovesFilesOnDestruct(): void
    {
        $context = (new ContextBuilder())->getContext();
        $file = $context->getDirectory().'/Dockerfile';
        $this->assertFileExists($file);

        unset($context);

        $this->assertFileDoesNotExist($file);
    }
}
