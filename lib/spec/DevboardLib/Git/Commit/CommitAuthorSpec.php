<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitAuthor;
use DevboardLib\Git\Commit\CommitDate;
use Git\Commit\CommitAuthor as CommitAuthorInterface;
use PhpSpec\ObjectBehavior;

class CommitAuthorSpec extends ObjectBehavior
{
    public function let(AuthorName $name, EmailAddress $email, CommitDate $commitDate)
    {
        $this->beConstructedWith($name, $email, $commitDate);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthor::class);
        $this->shouldImplement(CommitAuthorInterface::class);
    }

    public function it_exposes_name(AuthorName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_email(EmailAddress $email)
    {
        $this->getEmail()->shouldReturn($email);
    }

    public function it_exposes_commit_date(CommitDate $commitDate)
    {
        $this->getCommitDate()->shouldReturn($commitDate);
    }

    public function it_can_be_serialized(AuthorName $name, EmailAddress $email, CommitDate $commitDate)
    {
        $name->serialize()->shouldBeCalled()->willReturn('Jane Johnson');
        $email->serialize()->shouldBeCalled()->willReturn('jane@example.com');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-02T20:21:22+00:00');
        $this->serialize()->shouldReturn(['name' => 'Jane Johnson', 'email' => 'jane@example.com', 'commitDate' => '2018-01-02T20:21:22+00:00']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['name' => 'Jane Johnson', 'email' => 'jane@example.com', 'commitDate' => '2018-01-02T20:21:22+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitAuthor::class);
    }
}
