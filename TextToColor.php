<?php

declare(strict_types=1);

namespace SecIT;

/**
 * Class TextToColor.
 *
 * Text to color converter inspired on this stack overflow post https://stackoverflow.com/a/3724219/10561527
 *
 * @author Tomasz Gemza
 */
class TextToColor
{
    /**
     * Create RGB string (eg. #123456) from a given text.
     *
     * @param string $text
     * @param float  $saturation
     * @param float  $lightness
     *
     * @return string
     */
    public static function toRGB(string $text, float $saturation = 1, float $lightness = 0.9): string
    {
        $hue = unpack('L', hash('adler32', $text, true))[1];

        return self::hsl2rgb($hue/0xFFFFFFFF, $saturation, $lightness);
    }

    /**
     * HSL to RGB converter.
     *
     * @param $hue
     * @param $saturation
     * @param $lightness
     *
     * @return string
     */
    private static function hsl2rgb(float $hue, float $saturation, float $lightness): string
    {
        $hue *= 6;
        $h = intval($hue);
        $hue -= $h;
        $lightness *= 255;
        $m = $lightness * (1 - $saturation);
        $x = $lightness * (1 - $saturation * (1 - $hue));
        $y = $lightness * (1 - $saturation * $hue);
        $a = [
            [$lightness, $x, $m],
            [$y, $lightness, $m],
            [$m, $lightness, $x],
            [$m, $y, $lightness],
            [$x, $m, $lightness],
            [$lightness, $m, $y]
        ][$h];

        return sprintf("#%02X%02X%02X", $a[0], $a[1], $a[2]);
    }
}
