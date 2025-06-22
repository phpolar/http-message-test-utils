<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Exception;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

final class RequestStub implements ServerRequestInterface
{
    private array $headers = [];
    private UriInterface $uri;

    public function __construct(
        private string $method = "GET",
        private string $url = "",
        private array $queryParams = [],
        private null|array|object $parsedBody = []
    ) {
        $this->uri = new UriStub($url);
    }

    public function getAttribute($name, $default = null)
    {
        throw new Exception("Not Implemented");
    }

    public function getAttributes(): array
    {
        throw new Exception("Not Implemented");
    }

    public function getBody(): StreamInterface
    {
        throw new Exception("Not Implemented");
    }

    public function getCookieParams(): array
    {
        throw new Exception("Not Implemented");
    }

    public function getHeader($name): array
    {
        return $this->headers[$name];
    }

    public function getHeaderLine($name): string
    {
        throw new Exception("Not Implemented");
    }

    public function getHeaders(): array
    {
        throw new Exception("Not Implemented");
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }

    public function getProtocolVersion(): string
    {
        throw new Exception("Not Implemented");
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }


    public function getRequestTarget(): string
    {
        throw new Exception("Not Implemented");
    }

    public function getServerParams(): array
    {
        throw new Exception("Not Implemented");
    }

    public function getUploadedFiles(): array
    {
        throw new Exception("Not Implemented");
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function hasHeader($name): bool
    {
        throw new Exception("Not Implemented");
    }

    public function withAddedHeader($name, $value): static
    {
        throw new Exception("Not Implemented");
    }

    public function withAttribute($name, $value): static
    {
        throw new Exception("Not Implemented");
    }

    public function withBody(StreamInterface $body): static
    {
        throw new Exception("Not Implemented");
    }

    public function withCookieParams(array $cookies): static
    {
        throw new Exception("Not Implemented");
    }

    public function withHeader($name, $value): static
    {
        $this->headers[$name][] = $value;
        return $this;
    }

    public function withMethod($method): static
    {
        $copy = clone $this;
        $copy->method = $method;
        return $copy;
    }

    public function withoutAttribute($name): static
    {
        throw new Exception("Not Implemented");
    }

    public function withoutHeader($name): static
    {
        throw new Exception("Not Implemented");
    }

    public function withParsedBody($data): static
    {
        $copy = clone $this;
        $copy->parsedBody = $data;
        return $copy;
    }

    public function withProtocolVersion($version): static
    {
        throw new Exception("Not Implemented");
    }

    public function withQueryParams(array $query): static
    {
        $copy = clone $this;
        $copy->queryParams = $query;
        return $copy;
    }

    public function withRequestTarget($requestTarget): static
    {
        throw new Exception("Not Implemented");
    }

    public function withUploadedFiles(array $uploadedFiles): static
    {
        throw new Exception("Not Implemented");
    }

    public function withUri(UriInterface $uri, $preserveHost = false): static
    {
        $copy = clone $this;
        $copy->uri = $uri;
        return $copy;
    }
}
