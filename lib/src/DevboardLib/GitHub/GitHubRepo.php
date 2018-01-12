<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;

/**
 * @see \spec\DevboardLib\GitHub\GitHubRepoSpec
 * @see \Tests\DevboardLib\GitHub\GitHubRepoTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubRepo
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoOwner */
    private $owner;

    /** @var bool */
    private $private;

    /** @var BranchName */
    private $defaultBranch;

    /** @var bool */
    private $fork;

    /** @var RepoParent|null */
    private $parent;

    /** @var RepoDescription|null */
    private $description;

    /** @var RepoHomepage|null */
    private $homepage;

    /** @var RepoLanguage|null */
    private $language;

    /** @var RepoMirrorUrl|null */
    private $mirrorUrl;

    /** @var bool|null */
    private $archived;

    /** @var RepoEndpoints */
    private $endpoints;

    /** @var RepoStats */
    private $stats;

    /** @var RepoTimestamps */
    private $timestamps;

    public function __construct(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        bool $private,
        BranchName $defaultBranch,
        bool $fork,
        ?RepoParent $parent,
        ?RepoDescription $description,
        ?RepoHomepage $homepage,
        ?RepoLanguage $language,
        ?RepoMirrorUrl $mirrorUrl,
        ?bool $archived,
        RepoEndpoints $endpoints,
        RepoStats $stats,
        RepoTimestamps $timestamps
    ) {
        $this->id            = $id;
        $this->fullName      = $fullName;
        $this->owner         = $owner;
        $this->private       = $private;
        $this->defaultBranch = $defaultBranch;
        $this->fork          = $fork;
        $this->parent        = $parent;
        $this->description   = $description;
        $this->homepage      = $homepage;
        $this->language      = $language;
        $this->mirrorUrl     = $mirrorUrl;
        $this->archived      = $archived;
        $this->endpoints     = $endpoints;
        $this->stats         = $stats;
        $this->timestamps    = $timestamps;
    }

    public function getId(): RepoId
    {
        return $this->id;
    }

    public function getFullName(): RepoFullName
    {
        return $this->fullName;
    }

    public function getOwner(): RepoOwner
    {
        return $this->owner;
    }

    public function getPrivate(): bool
    {
        return $this->private;
    }

    public function getDefaultBranch(): BranchName
    {
        return $this->defaultBranch;
    }

    public function getFork(): bool
    {
        return $this->fork;
    }

    public function getParent(): ?RepoParent
    {
        return $this->parent;
    }

    public function getDescription(): ?RepoDescription
    {
        return $this->description;
    }

    public function getHomepage(): ?RepoHomepage
    {
        return $this->homepage;
    }

    public function getLanguage(): ?RepoLanguage
    {
        return $this->language;
    }

    public function getMirrorUrl(): ?RepoMirrorUrl
    {
        return $this->mirrorUrl;
    }

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function getEndpoints(): RepoEndpoints
    {
        return $this->endpoints;
    }

    public function getStats(): RepoStats
    {
        return $this->stats;
    }

    public function getTimestamps(): RepoTimestamps
    {
        return $this->timestamps;
    }

    public function serialize(): array
    {
        if (null === $this->parent) {
            $parent = null;
        } else {
            $parent = $this->parent->serialize();
        }

        if (null === $this->description) {
            $description = null;
        } else {
            $description = $this->description->serialize();
        }

        if (null === $this->homepage) {
            $homepage = null;
        } else {
            $homepage = $this->homepage->serialize();
        }

        if (null === $this->language) {
            $language = null;
        } else {
            $language = $this->language->serialize();
        }

        if (null === $this->mirrorUrl) {
            $mirrorUrl = null;
        } else {
            $mirrorUrl = $this->mirrorUrl->serialize();
        }

        return [
            'id'            => $this->id->serialize(),
            'fullName'      => $this->fullName->serialize(),
            'owner'         => $this->owner->serialize(),
            'private'       => $this->private,
            'defaultBranch' => $this->defaultBranch->serialize(),
            'fork'          => $this->fork,
            'parent'        => $parent,
            'description'   => $description,
            'homepage'      => $homepage,
            'language'      => $language,
            'mirrorUrl'     => $mirrorUrl,
            'archived'      => $this->archived,
            'endpoints'     => $this->endpoints->serialize(),
            'stats'         => $this->stats->serialize(),
            'timestamps'    => $this->timestamps->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['parent']) {
            $parent = null;
        } else {
            $parent = RepoParent::deserialize($data['parent']);
        }

        if (null === $data['description']) {
            $description = null;
        } else {
            $description = RepoDescription::deserialize($data['description']);
        }

        if (null === $data['homepage']) {
            $homepage = null;
        } else {
            $homepage = RepoHomepage::deserialize($data['homepage']);
        }

        if (null === $data['language']) {
            $language = null;
        } else {
            $language = RepoLanguage::deserialize($data['language']);
        }

        if (null === $data['mirrorUrl']) {
            $mirrorUrl = null;
        } else {
            $mirrorUrl = RepoMirrorUrl::deserialize($data['mirrorUrl']);
        }

        return new self(
            RepoId::deserialize($data['id']),
            RepoFullName::deserialize($data['fullName']),
            RepoOwner::deserialize($data['owner']),
            $data['private'],
            BranchName::deserialize($data['defaultBranch']),
            $data['fork'],
            $parent,
            $description,
            $homepage,
            $language,
            $mirrorUrl,
            $data['archived'],
            RepoEndpoints::deserialize($data['endpoints']),
            RepoStats::deserialize($data['stats']),
            RepoTimestamps::deserialize($data['timestamps'])
        );
    }
}
