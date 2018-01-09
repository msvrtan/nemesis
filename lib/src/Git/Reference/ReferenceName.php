<?php

declare(strict_types=1);

namespace Git\Reference;

interface ReferenceName
{
    public function serialize(): string;

    public static function deserialize(string $name);
}
