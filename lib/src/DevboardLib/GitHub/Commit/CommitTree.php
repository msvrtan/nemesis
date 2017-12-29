<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitTreeSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitTreeTest
 */
class CommitTree
{
    /** @var CommitSha */
    private $sha;

    /** @var TreeApiUrl */
    private $url;

    public function __construct(CommitSha $sha, TreeApiUrl $url)
    {
        $this->sha = $sha;
        $this->url = $url;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function getUrl(): TreeApiUrl
    {
        return $this->url;
    }

    public function serialize(): array
    {
        return [
            'sha' => $this->sha->serialize(),
            'url' => $this->url->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            CommitSha::deserialize($data['sha']),
            TreeApiUrl::deserialize($data['url'])
        );
    }
}
