<?php

namespace App\CodeChallenge\Domain\Rule;

final readonly class BuzzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return $number % 5 == 0 ? 'Buzz' : null;
    }
}
