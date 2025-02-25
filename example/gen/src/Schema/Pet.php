<?php

declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Schema;

use JsonSerializable;

class Pet implements SerializableInterface, JsonSerializable
{
    public const STATUS_AVAILABLE = 'available';

    public const STATUS_PENDING = 'pending';

    public const STATUS_SOLD = 'sold';

    private ?int $id = null;

    private string $name;

    private ?Category $category = null;

    private array $photoUrls;

    private ?TagCollection $tags = null;

    private ?string $status = null;

    /**
     * @param string[] $photoUrls
     */
    public function __construct(string $name, array $photoUrls)
    {
        $this->name      = $name;
        $this->photoUrls = $photoUrls;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function setTags(TagCollection $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @return string[]
     */
    public function getPhotoUrls(): array
    {
        return $this->photoUrls;
    }

    public function getTags(): ?TagCollection
    {
        return $this->tags;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        $fields = [];
        if ($this->id !== null) {
            $fields['id'] = $this->id;
        }
        $fields['name'] = $this->name;
        if ($this->category !== null) {
            $fields['category'] = $this->category->toArray();
        }
        $fields['photoUrls'] = $this->photoUrls;
        if ($this->tags !== null) {
            $fields['tags'] = $this->tags->toArray();
        }
        if ($this->status !== null) {
            $fields['status'] = $this->status;
        }

        return $fields;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
