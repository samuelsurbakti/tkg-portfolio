<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function picture(string $folder, string $filename, string $type = null, array $attrs = []): string
    {
        $base = "src/img/{$folder}/";
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $name = pathinfo($filename, PATHINFO_FILENAME);

        $suffix = $type ? '-' . $type : '';
        $webp = $base . $name . $suffix . '.webp';
        $original = $base . $filename;

        $attrString = collect($attrs)->map(fn($v, $k) => $k . '="' . e($v) . '"')->implode(' ');

        $html = "<picture>";

        // WebP source
        if (Storage::exists('src/img/' . $folder . '/' . $name . $suffix . '.webp')) {
            $html .= "<source srcset=\"" . asset($webp) . "\" type=\"image/webp\">";
        }

        // Fallback image
        $html .= "<img src=\"" . asset($original) . "\" $attrString>";

        $html .= "</picture>";

        return $html;
    }
}
