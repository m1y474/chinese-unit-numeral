<?php

namespace UnitNumeralCh;

/**
 * 漢数字の単位をつける
 */
class UnitNumeralCh
{
    /**
     * 漢数字の単位
     *
     * @var array
     */
    const UNITS = ['', '万', '億', '兆', '京'];

    /**
     * 数値を漢数字に変換する
     *
     * @param integer $value
     * @param boolean $isFormat
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public static function convert(int $value, $isFormat = true)
    {
        // 1000以下の場合は単位を付けずに返却
        if ((int) $value < 1000) {
            return (string) $value;
        }

        // 右から桁数を分割していく
        $splits = array_reverse(str_split(strrev($value), 4));

        // 桁数によって使用する単位の調整
        $units = self::UNITS;
        array_splice($units, count($splits));
        $filterUnits = array_reverse($units);

        $convert = '';
        // 反転した数値を元に戻して単位をつける
        foreach ($splits as $index => $split) {
            // フォーマットしない
            if (!$isFormat) {
                $convert .= strrev($split) . $filterUnits[$index];
                continue;
            }
            // 0000の場合、表記を省略する
            $convert .= (int) $split === 0 ? '' : number_format(strrev($split)) . $filterUnits[$index];
        }

        return $convert;
    }
}
