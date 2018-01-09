<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Tag\TagName;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Command\DeleteGitHubTagSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Command\DeleteGitHubTagTest
 */
class DeleteGitHubTag
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var TagName */
    private $name;

    public function __construct(GitHubRepoRootId $id, TagName $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getName(): TagName
    {
        return $this->name;
    }

    public function serialize(): array
    {
        return [
            'id'   => $this->id->serialize(),
            'name' => $this->name->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubRepoRootId::deserialize($data['id']), TagName::deserialize($data['name']));
    }
}
