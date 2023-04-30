<?php

declare(strict_types=1);

namespace Phpolar\HttpMessageTestUtils;

use Exception;
use Psr\Http\Message\StreamInterface;

final class MemoryStreamStub implements StreamInterface
{
    /**
     * @var resource $memoryStream
     */
    private $memoryStream;

    public function __construct($content = "", $mode = "+w")
    {
        $this->memoryStream = fopen("php://memory", $mode);
        $this->write($content);
        $this->rewind();
    }

    public function __toString()
    {
        return stream_get_contents($this->memoryStream);
    }

    public function close(): void
    {
        fclose($this->memoryStream);
    }

    public function detach()
    {
        throw new Exception("Not Implemented");
    }

    public function eof(): bool
    {
        return feof($this->memoryStream);
    }

    public function getContents(): string
    {
        return (string) $this;
    }

    public function getMetadata($key = null)
    {
        throw new Exception("Not Implemented");
    }

    public function getSize(): int
    {
        ["size" => $size] = fstat($this->memoryStream);
        return $size;
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function isSeekable(): bool
    {
        ["seekable" => $isSeekable] = stream_get_meta_data($this->memoryStream);
        return $isSeekable;
    }

    public function isWritable(): bool
    {
        return true;
    }

    public function read($length): string
    {
        return fread($this->memoryStream, $length);
    }

    public function rewind(): void
    {
        rewind($this->memoryStream);
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
        fseek($this->memoryStream, $offset, $whence);
    }

    public function tell(): int
    {
        return ftell($this->memoryStream);
    }

    public function write($string): int
    {
        $writttenBytes = fwrite($this->memoryStream, $string);
        return $writttenBytes !== false ? $writttenBytes : 0;
    }
}
