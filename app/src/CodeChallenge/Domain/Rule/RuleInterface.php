<?php

namespace App\CodeChallenge\Domain\Rule;

interface RuleInterface
{
    public function apply(int $number): ?string;
}
