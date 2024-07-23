<?php

namespace App\CodeChallenge\Domain\Rule;

class NumberRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return ($number % 3 != 0 && $number % 5 != 0) ? (string)$number : null;
    }
}
