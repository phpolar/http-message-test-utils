<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Exception;
use Psr\Http\Message\UriInterface;

final class UriStub implements UriInterface
{
    public function __construct(
        private string $path,
        private string $scheme = "http",
        private string $userInfo = "",
        private string $authority = "",
        private string $fragment = "",
        private string $host = "",
        private int $port = 0,
        private string $query = "",
    ) {
    }

    public function getAuthority(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function getFragment(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function getHost(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getPort(): int
    {
        return throw new Exception("Not Implemented");
    }

    public function getQuery(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function getScheme(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function getUserInfo(): string
    {
        return throw new Exception("Not Implemented");
    }

    public function withFragment($fragment): static
    {
        return throw new Exception("Not Implemented");
    }

    public function withHost($host): static
    {
        return throw new Exception("Not Implemented");
    }

    public function withPath($path): static
    {
        $copy = clone $this;
        $copy->path = $path;
        return $copy;
    }

    public function withPort($port): static
    {
        return throw new Exception("Not Implemented");
    }

    public function withQuery($query): static
    {
        return throw new Exception("Not Implemented");
    }

    public function withScheme($scheme): static
    {
        return throw new Exception("Not Implemented");
    }

    public function withUserInfo($user, $password = null): static
    {
        return throw new Exception("Not Implemented");
    }

    public function __toString()
    {
        return sprintf(
            "%s://%s",
            $this->scheme,
            $this->userInfo
                . $this->authority
                . $this->path
                . (("" === $this->fragment ?: "#") . $this->fragment)
                . (("" === $this->query ?: "?") . $this->query),
        );
    }
}
