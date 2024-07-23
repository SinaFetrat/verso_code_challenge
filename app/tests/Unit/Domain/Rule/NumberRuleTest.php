<?php

namespace App\Tests\Unit\Domain\Rule;

use App\CodeChallenge\Domain\Rule\NumberRule;
use PHPUnit\Framework\TestCase;

final class NumberRuleTest extends TestCase
{
    public function test_apply_returns_null_when_divisible_by_3_or_5()
    {
        $rule = new NumberRule();

        $this->assertNull($rule->apply(3));
        $this->assertNull($rule->apply(5));
        $this->assertNull($rule->apply(6));
        $this->assertNull($rule->apply(10));
        $this->assertNull($rule->apply(15));
    }
}
