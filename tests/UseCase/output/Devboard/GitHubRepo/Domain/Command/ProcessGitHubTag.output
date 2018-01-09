<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\GitHub\GitHubTag;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Command\ProcessGitHubTagSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Command\ProcessGitHubTagTest
 */
class ProcessGitHubTag
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubTag */
    private $tag;

    public function __construct(GitHubRepoRootId $id, GitHubTag $tag)
    {
        $this->id  = $id;
        $this->tag = $tag;
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getTag(): GitHubTag
    {
        return $this->tag;
    }

    public function serialize(): array
    {
        return [
            'id'  => $this->id->serialize(),
            'tag' => $this->tag->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubRepoRootId::deserialize($data['id']), GitHubTag::deserialize($data['tag']));
    }
}
