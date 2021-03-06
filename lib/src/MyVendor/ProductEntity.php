<?php

declare(strict_types=1);

namespace MyVendor;

use DateTime;
use MyVendor\Base\SomeInterface as AnotherInterface;
use MyVendor\Product\ProductId;
use MyVendor\Product\ProductWeight;

/**
 * @see \spec\MyVendor\ProductEntitySpec
 * @see \Tests\MyVendor\ProductEntityTest
 */
class ProductEntity extends BaseModel implements AnotherInterface
{
    use JsonSerializable;

    const RANDOM_CONST = 188;

    /** @var ProductId */
    private $id;

    /** @var string */
    private $title;

    /** @var string|null */
    private $description;

    /** @var ProductWeight|null */
    private $weight;

    /** @var DateTime */
    private $updatedAt;

    public function __construct(
        ProductId $id, string $title, ?string $description, ?ProductWeight $weight, DateTime $updatedAt
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->weight      = $weight;
        $this->updatedAt   = $updatedAt;
    }

    public function getId(): ProductId
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getWeight(): ?ProductWeight
    {
        return $this->weight;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function hasDescription(): bool
    {
        if (null === $this->description) {
            return false;
        }

        return true;
    }

    public function hasWeight(): bool
    {
        if (null === $this->weight) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->weight) {
            $weight = null;
        } else {
            $weight = $this->weight->serialize();
        }

        return [
            'id'          => $this->id->serialize(),
            'title'       => $this->title,
            'description' => $this->description,
            'weight'      => $weight,
            'updatedAt'   => $this->updatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['weight']) {
            $weight = null;
        } else {
            $weight = ProductWeight::deserialize($data['weight']);
        }

        return new self(
            ProductId::deserialize($data['id']),
            $data['title'],
            $data['description'],
            $weight,
            new DateTime($data['updatedAt'])
        );
    }
}
