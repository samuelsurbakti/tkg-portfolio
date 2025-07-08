<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Buglinjo\LaravelWebp\Webp;

class ImageService
{
    public static function storeWithWebp(UploadedFile $file, string $uniqId, string $path, ?string $recentFilename = null): string
    {
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = $uniqId . '.' . $extension;

            $file->storeAs($path, $filename);
            $destination = storage_path('app/' . $path . '/' . pathinfo($filename, PATHINFO_FILENAME) . '.webp');
            Webp::make($file)->save($destination);

            return $filename;
        }

        return $recentFilename;
    }
}
