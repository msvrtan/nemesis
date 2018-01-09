<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain;

use DevboardLib\Git\Branch\BranchName;
use Webmozart\Assert\Assert;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\GitHubBranchCollectionSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\GitHubBranchCollectionTest
 */
class GitHubBranchCollection
{
    /** @var array|GitHubBranchEntity[] */
    private $elements;

    /**
     * @param GitHubBranchEntity[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubBranchEntity::class);
        $this->elements = $elements;
    }

    public function add(GitHubBranchEntity $element)
    {
        $this->elements[] = $element;
    }

    public function has(BranchName $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(BranchName $id)
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
