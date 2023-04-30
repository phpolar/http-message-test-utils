<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Exception;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class StreamFactoryStub implements StreamFactoryInterface
{
    public function __construct(private string $mode)
    {
    }

    public function createStream(string $content = ''): StreamInterface
    {
        return new MemoryStreamStub($content, $this->mode);
    }

    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        throw new Exception("not implemented");
    }
    public function createStreamFromResource($resource): StreamInterface
    {
        throw new Exception("not implemented");
    }
}
