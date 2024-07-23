<?php

namespace App\Tests\Unit\Domain\Rule;

use App\CodeChallenge\Domain\Rule\FizzRule;
use PHPUnit\Framework\TestCase;

final class FizzRuleTest extends TestCase
{
    public function test_apply_returns_fizz_when_divisible_by_3()
    {
        $rule = new FizzRule();

        $this->assertEquals('Fizz', $rule->apply(3));
        $this->assertEquals('Fizz', $rule->apply(6));
        $this->assertEquals('Fizz', $rule->apply(9));
    }

    public function test_apply_returns_null_when_not_divisible_by_3()
    {
        $rule = new FizzRule();

        $this->assertNull($rule->apply(1));
        $this->assertNull($rule->apply(2));
        $this->assertNull($rule->apply(4));
        $this->assertNull($rule->apply(5));
        $this->assertNull($rule->apply(7));
    }
}
