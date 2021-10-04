<?php

namespace Digila\ValueObjects\Tests;

use Digila\ValueObjects\Tests\VO\Nullable\StringValue as StringValueNullable;
use Digila\ValueObjects\Tests\VO\StringValue;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class StringValueTest extends TestCase
{
    /**
     * @test
     * 
     * @covers \Digila\ValueObjects\Tests\VO\StringValue::__construct
     * @covers \Digila\ValueObjects\Tests\VO\StringValue::value
     * @covers \Digila\ValueObjects\Tests\VO\StringValue::isValid
     *
     * @group digila-valueobject
     * @group digila-valueobject-string
     */
    public function 文字列型のバリューオブジェクトのテスト()
    {
        $value = new StringValue('テスト文字列型');

        $this->assertSame($value->value(), 'テスト文字列型');
        $this->assertFalse(StringValue::isValid(null));

        // E_ERRORを出力しない
        $this->expectError();

        $this->expectException(new StringValue(null));
        $this->expectException(new StringValue(''));
    }

    /**
     * @test
     * 
     * @covers \Digila\ValueObjects\Tests\VO\Nullable\StringValue::__construct
     * @covers \Digila\ValueObjects\Tests\VO\Nullable\StringValue::value
     * @covers \Digila\ValueObjects\Tests\VO\Nullable\StringValue::isValid
     *
     * @group digila-valueobject
     * @group digila-valueobject-string
     * @group digila-valueobject-string-nullable
     */
    public function 文字列型のバリューオブジェクトのテストNullable()
    {
        $value = new StringValueNullable('テスト文字列型');

        $this->assertSame($value->value(), 'テスト文字列型');
        $this->assertTrue(StringValueNullable::isValid(null));
    }
}
