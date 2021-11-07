<?php

namespace ChineseUnitNumeral;

/**
 * 漢数字の単位をつける
 */
class ChineseUnitNumeral
{
    /**
     * 漢数字の単位
     *
     * @var array
     */
    const UNITS = ['京', '兆', '億', '万', ''];

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

        // 桁数によって使用する単位の調整
        $units = self::UNITS;
        switch ($value) {
        case $value < 100000000:
            $units = array_splice($units, 3);
            break;
        case $value < 1000000000000:
            $units = array_splice($units, 2);
            break;
        case $value < 10000000000000000:
            $units = array_splice($units, 1);
            break;
        }

        // 右から桁数を分割していく
        $splits = str_split(strrev($value), 4);
        $convert = '';
        // 反転した数値を元に戻して単位をつける
        foreach (array_reverse($splits) as $index => $split) {
            // フォーマットしない
            if (!$isFormat) {
                $convert .= strrev($split) . $units[$index];
                continue;
            }
            // 0000の場合、表記を省略する
            $convert .= (int) $split === 0 ? '' : number_format(strrev($split)) . $units[$index];
        }

        return $convert;
    }
}
