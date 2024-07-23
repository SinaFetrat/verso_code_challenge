<?php

namespace App\CodeChallenge\Domain\Rule;

class FizzBuzzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return $number % 15 == 0 ? 'FizzBuzz' : null;
    }
}
