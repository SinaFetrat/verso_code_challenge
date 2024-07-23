<?php

namespace App\Tests\Unit\Domain;

use App\CodeChallenge\Domain\FizzBuzzGenerator;
use App\CodeChallenge\Domain\Rule\BuzzRule;
use App\CodeChallenge\Domain\Rule\FizzBuzzRule;
use App\CodeChallenge\Domain\Rule\FizzRule;
use App\CodeChallenge\Domain\Rule\NumberRule;
use PHPUnit\Framework\TestCase;

final class FizzBuzzGeneratorTest extends TestCase
{
    public function test_generate_generates_expected_result()
    {
        $rules = [new FizzBuzzRule(), new FizzRule(), new BuzzRule(),  new NumberRule()];

        $generator = new FizzBuzzGenerator($rules);

        $result = $generator->generate(1, 15);

        $expected = [
            '1',
            '2',
            'Fizz',
            '4',
            'Buzz',
            'Fizz',
            '7',
            '8',
            'Fizz',
            'Buzz',
            '11',
            'Fizz',
            '13',
            '14',
            'FizzBuzz',
        ];

        $this->assertEquals($expected, $result);
    }
}
