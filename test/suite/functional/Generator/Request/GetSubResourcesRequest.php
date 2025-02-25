<?php

declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace Test\Request;

use Test\Schema\SerializableInterface;
use Test\Schema\SubResourceFilter;

class GetSubResourcesRequest implements RequestInterface
{
    private ?SubResourceFilter $filter = null;

    private string $contentType = '';

    private string $bearerToken;

    public function __construct(string $bearerToken)
    {
        $this->bearerToken = $bearerToken;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setFilter(SubResourceFilter $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getRoute(): string
    {
        return 'v1/resources/sub-resources';
    }

    public function getQueryParameters(): array
    {
        return \array_map(static function ($value) {
            return $value instanceof SerializableInterface ? $value->toArray() : $value;
        }, \array_filter(['filter' => $this->filter], static function ($value) {
            return null !== $value;
        }));
    }

    public function getRawQueryParameters(): array
    {
        return ['filter' => $this->filter];
    }

    public function getCookies(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return ['Authorization' => \sprintf('Bearer %s', $this->bearerToken)];
    }

    public function getBody()
    {
        return null;
    }
}
