<?php

namespace App\CodeChallenge\Application;

use App\CodeChallenge\Domain\FizzBuzzGenerator;

final readonly class FizzBuzzService
{
    public function __construct(private FizzBuzzGenerator $fizzBuzz)
    {
    }

    public function getFizzBuzzOutput(int $start, int $end): array
    {
        return $this->fizzBuzz->generate($start, $end);
    }
}
