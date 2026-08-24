<?php

namespace App\Support;

/**
 * Generates deterministic, self-contained SVG placeholder images as data URIs.
 *
 * Used until real package/destination/testimonial photos exist in the
 * database. Being self-contained (no network request) keeps the home page
 * fast and avoids depending on a third-party image host.
 */
class PlaceholderImage
{
    public static function make(string $seed, int $width = 400, int $height = 300): string
    {
        $hash = crc32($seed);
        $hueFrom = $hash % 360;
        $hueTo = ($hueFrom + 45) % 360;

        $svg = sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 %1$d %2$d" role="img">'
                .'<defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1">'
                .'<stop offset="0%%" stop-color="hsl(%3$d,65%%,55%%)"/>'
                .'<stop offset="100%%" stop-color="hsl(%4$d,65%%,38%%)"/>'
                .'</linearGradient></defs>'
                .'<rect width="%1$d" height="%2$d" fill="url(#g)"/>'
                .'<circle cx="%5$d" cy="%6$d" r="%7$d" fill="rgba(255,255,255,0.15)"/>'
                .'<circle cx="%8$d" cy="%9$d" r="%10$d" fill="rgba(255,255,255,0.12)"/>'
                .'</svg>',
            $width,
            $height,
            $hueFrom,
            $hueTo,
            (int) ($width * 0.28),
            (int) ($height * 0.65),
            (int) ($height * 0.42),
            (int) ($width * 0.78),
            (int) ($height * 0.28),
            (int) ($height * 0.24)
        );

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}
