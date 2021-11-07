<?php

use UnitNumeralCh\UnitNumeralCh;
use PHPUnit\Framework\TestCase;

class UnitNumeralChTest extends TestCase
{
    public function test戦闘力()
    {
        // 変換される
        $this->assertSame('私の戦闘力は53万です', '私の戦闘力は'.UnitNumeralCh::convert(530000).'です');
        // 変換されない
        $this->assertSame('戦闘力…たったの5か…ゴミめ…', '戦闘力…たったの'.UnitNumeralCh::convert(5).'か…ゴミめ…');
    }

    /**
     * @dataProvider values
     */
    public function test漢数字に変換される($excepted, $value, $format=true)
    {
        $this->assertSame($excepted, UnitNumeralCh::convert($value, $format));
    }

    public function values()
    {
        return [
            ['1億', '100000000'],
            ['10兆', '10000000000000'],
            ['100京', '1000000000000000000'],
            ['1,001万100', '10010100'],
            ['0', '0'],
            ['200', '200'],
            ['1億3万4,000', '100034000'],
            ['1億0003万4000', '100034000', false],
            ['1京1', '10000000000000001'],
            ['1京0000兆0000億0000万0001', '10000000000000001', false],
            ['1,123億400万', '112304000000'],
        ];
    }
}
