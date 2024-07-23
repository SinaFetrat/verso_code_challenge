<?php

namespace App\Tests\Unit\Domain\Rule;

use App\CodeChallenge\Domain\Rule\BuzzRule;
use PHPUnit\Framework\TestCase;

final class BuzzRuleTest extends TestCase
{
    public function test_apply_returns_buzz_when_divisible_by_5()
    {
        $rule = new BuzzRule();

        $this->assertEquals('Buzz', $rule->apply(5));
        $this->assertEquals('Buzz', $rule->apply(10));
        $this->assertEquals('Buzz', $rule->apply(20));
    }

    public function test_apply_returns_null_when_not_devisible_by_5()
    {
        $rule = new BuzzRule();

        $this->assertNull($rule->apply(1));
        $this->assertNull($rule->apply(2));
        $this->assertNull($rule->apply(3));
        $this->assertNull($rule->apply(4));
        $this->assertNull($rule->apply(6));
    }
}
