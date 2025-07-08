<?php

namespace App\Console\Commands;

use Buglinjo\LaravelWebp\Webp;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConvertImagesToWebp extends Command
{
    protected $signature = 'webp:convert-all';
    protected $description = 'Convert all images in storage/app/src/img to WebP format';

    public function handle()
    {
        $folder = storage_path('app/src/img');

        $files = collect(File::allFiles($folder))
            ->filter(fn($file) => in_array($file->getExtension(), ['jpg', 'jpeg', 'png']));

        if ($files->isEmpty()) {
            $this->info('No images found.');
            return;
        }

        foreach ($files as $file) {
            $filename = $file->getFilenameWithoutExtension();
            $webpPath = $file->getPath() . '/' . $filename . '.webp';

            if (file_exists($webpPath)) {
                $this->line("✔ {$filename}.webp already exists — skipped");
                continue;
            }

            try {
                $uploadedFile = new UploadedFile(
                    $file->getRealPath(),
                    $file->getFilename(),
                    null,
                    null,
                    true
                );

                Webp::make($uploadedFile)->save($webpPath);
                $this->info("✅ Converted: {$file->getFilename()} → {$filename}.webp");
            } catch (\Exception $e) {
                $this->error("⚠ Failed: {$file->getFilename()} — " . $e->getMessage());
            }
        }
    }
}
