<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use PhpSpec\ObjectBehavior;

class CommitCommitterSpec extends ObjectBehavior
{
    public function let(CommitterName $name, EmailAddress $email, CommitDate $date, CommitCommitterDetails $committerDetails)
    {
        $this->beConstructedWith($name, $email, $date, $committerDetails);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommitter::class);
    }

    public function it_exposes_name(CommitterName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_email(EmailAddress $email)
    {
        $this->getEmail()->shouldReturn($email);
    }

    public function it_exposes_date(CommitDate $date)
    {
        $this->getDate()->shouldReturn($date);
    }

    public function it_exposes_committer_details(CommitCommitterDetails $committerDetails)
    {
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }

    public function it_can_be_serialized(CommitterName $name, EmailAddress $email, CommitDate $date, CommitCommitterDetails $committerDetails)
    {
        $name->serialize()->shouldBeCalled()->willReturn('Jane Johnson');
        $email->serialize()->shouldBeCalled()->willReturn('jane@example.com');
        $date->serialize()->shouldBeCalled()->willReturn('2018-01-02T20:21:22+00:00');
        $committerDetails->serialize()->shouldBeCalled()->willReturn(
            [
                'id'         => 1,
                'login'      => 'login',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => 'id',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ]
        );
        $this->serialize()->shouldReturn(
            [
                'name'             => 'Jane Johnson',
                'email'            => 'jane@example.com',
                'date'             => '2018-01-02T20:21:22+00:00',
                'committerDetails' => [
                    'id'         => 1,
                    'login'      => 'login',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => 'id',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'name'             => 'Jane Johnson',
            'email'            => 'jane@example.com',
            'date'             => '2018-01-02T20:21:22+00:00',
            'committerDetails' => [
                'id'         => 1,
                'login'      => 'login',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => 'id',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitCommitter::class);
    }
}
