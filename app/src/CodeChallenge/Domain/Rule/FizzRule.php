<?php

namespace App\CodeChallenge\Domain\Rule;

final readonly class FizzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return $number % 3 == 0 ? 'Fizz' : null;
    }
}
