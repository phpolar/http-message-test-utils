<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class ResponseStub implements ResponseInterface
{
    private StreamInterface $body;

    private string $version = "1.1";

    /**
     * @var array<string,array<string>>
     */
    private array $headers = [];

    public function __construct(
        private int $statusCode = 200,
        private string $reasonPhrase = "",
    ) {
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function getCookieParams(): array
    {
        throw new Exception("Not implemented");
    }

    public function getHeader($name): array
    {
        throw new Exception("Not implemented");
    }

    public function getHeaderLine($name): string
    {
        throw new Exception("Not implemented");
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getProtocolVersion(): string
    {
        return $this->version;
    }

    public function getReasonPhrase(): string
    {
        return $this->reasonPhrase;
    }

    public function getRequestTarget(): string
    {
        throw new Exception("Not implemented");
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function hasHeader($name): bool
    {
        throw new Exception("Not implemented");
    }

    public function withAddedHeader($name, $value): static
    {
        throw new Exception("Not implemented");
    }

    public function withBody(StreamInterface $body): static
    {
        $copy = clone $this;
        $copy->body = $body;
        return $copy;
    }

    public function withHeader($name, $value): static
    {
        $copy = clone $this;
        if (is_array($value) === true) {
            $copy->headers[$name] = [...$copy->headers[$name], ...$value];
            return $copy;
        }
        $copy->headers[$name][] = $value;
        return $copy;
    }

    public function withoutHeader($name): static
    {
        throw new Exception("Not implemented");
    }

    public function withProtocolVersion($version): static
    {
        $copy = clone $this;
        $copy->version = $version;
        return $copy;
    }

    public function withStatus($code, $reasonPhrase = ''): static
    {
        $copy = clone $this;
        $copy->statusCode = $code;
        $copy->reasonPhrase = $reasonPhrase;
        return $copy;
    }
}
