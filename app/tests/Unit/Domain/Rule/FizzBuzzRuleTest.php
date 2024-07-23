<?php

namespace App\Tests\Unit\Domain\Rule;

use App\CodeChallenge\Domain\Rule\FizzBuzzRule;
use PHPUnit\Framework\TestCase;

final class FizzBuzzRuleTest extends TestCase
{
    public function test_apply_returns_fizz_buzz_when_divisible_by_15()
    {
        $rule = new FizzBuzzRule();

        $this->assertEquals('FizzBuzz', $rule->apply(15));
        $this->assertEquals('FizzBuzz', $rule->apply(30));
        $this->assertEquals('FizzBuzz', $rule->apply(45));
    }

    public function test_apply_returns_null_when_not_divisable_by_15()
    {
        $rule = new FizzBuzzRule();

        $this->assertNull($rule->apply(1));
        $this->assertNull($rule->apply(3));
        $this->assertNull($rule->apply(5));
        $this->assertNull($rule->apply(7));
        $this->assertNull($rule->apply(10));
        $this->assertNull($rule->apply(14));
        $this->assertNull($rule->apply(16));
        $this->assertNull($rule->apply(20));
    }
}
