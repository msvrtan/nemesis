<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\SpecPsr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use PhpSpec\ObjectBehavior;

class ConfigSpec extends ObjectBehavior
{
    public function let(Psr4Path $psr4Path, SpecPsr4Path $specPsr4Path, TestPsr4Path $testPsr4Path)
    {
        $this->beConstructedWith(
            [$psr4Path],
            [$specPsr4Path],
            [$testPsr4Path],
            'tests',
            'PHPUnit\Framework\TestCase',
            ['Class\To\Ignore'],
            ['Interface\To\Ignore']
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }

    public function it_exposes_source_code_paths(Psr4Path $psr4Path)
    {
        $this->getSourceCodePaths()
            ->shouldReturn([$psr4Path]);
    }

    public function it_exposes_spec_paths(SpecPsr4Path $specPsr4Path)
    {
        $this->getSpecPaths()
            ->shouldReturn([$specPsr4Path]);
    }

    public function it_exposes_test_paths(TestPsr4Path $testPsr4Path)
    {
        $this->getTestPaths()
            ->shouldReturn([$testPsr4Path]);
    }

    public function it_exposes_clases_to_ignore()
    {
        $this->getPhpUnitIgnoreInstancesOfList()
            ->shouldReturn(['Class\To\Ignore']);
    }

    public function it_exposes_interfaces_to_ignore()
    {
        $this->getPhpUnitIgnoreInterfacesList()
            ->shouldReturn(['Interface\To\Ignore']);
    }
}
