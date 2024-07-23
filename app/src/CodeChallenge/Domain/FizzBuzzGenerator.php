<?php

namespace App\CodeChallenge\Domain;

final readonly class FizzBuzzGenerator
{

    public function __construct(private array $rules)
    {
    }

    public function generate(int $start, int $end): array
    {
        $result = [];
        for ($i = $start; $i <= $end; $i++) {
            $result[] = $this->applyRules($i);
        }
        return $result;
    }

    private function applyRules(int $number): string
    {
        foreach ($this->rules as $rule) {
            $output = $rule->apply($number);
            if ($output !== null) {
                return $output;
            }
        }
        return $number;
    }
}
