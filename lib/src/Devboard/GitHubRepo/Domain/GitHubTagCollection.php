<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain;

use DevboardLib\Git\Tag\TagName;
use Webmozart\Assert\Assert;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\GitHubTagCollectionSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\GitHubTagCollectionTest
 */
class GitHubTagCollection
{
    /** @var array|GitHubTagEntity[] */
    private $elements;

    /**
     * @param GitHubTagEntity[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubTagEntity::class);
        $this->elements = $elements;
    }

    public function add(GitHubTagEntity $element)
    {
        $this->elements[] = $element;
    }

    public function has(TagName $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(TagName $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
                return $element;
            }
        }

        return null;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements);
    }
}
