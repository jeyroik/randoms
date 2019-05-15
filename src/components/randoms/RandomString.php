<?php
namespace jr\components\randoms;

/**
 * Class RandomString
 *
 * @package jr\components\randoms
 * @author Jeyroik <jeyroik@gmail.com>
 */
class RandomString
{
    public const NUMBERS = '0123456789';
    public const LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    public const SPECIALS = '!@#$%^&*()_+?><":}{|][,./\'\\=-`~';

    public const SAFE = self::NUMBERS . self::LETTERS;
    public const UNSAFE = self::SAFE . self::SPECIALS;

    /**
     * @param int $length
     * @param bool $safe
     *
     * @return string
     */
    public static function generate(int $length, bool $safe = true): string
    {
        $length = ($length <= 0) ? 1 : $length;

        $min = $length;
        $max = $length + $length;

        $alphabet = str_repeat($safe ? static::SAFE : static::UNSAFE, mt_rand($min, $max));
        return (string) substr(str_shuffle($alphabet . sha1(time() . mt_rand(1000, 9999))), 0, $length);
    }
}
