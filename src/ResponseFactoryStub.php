<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class ResponseFactoryStub implements ResponseFactoryInterface
{
    public function __construct(private ?StreamInterface $stream = null)
    {
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $response = new ResponseStub($code, $reasonPhrase);
        return $this->stream === null ?  $response : $response->withBody($this->stream);
    }
}
