<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ResizeImagesCommand extends Command
{
    protected $signature = 'images:resize';
    protected $description = 'Resize images in src/img into optimized WebP versions';

    public function handle()
    {
        $basePath = storage_path('app/src/img');

        $this->info("Resizing images in: $basePath");

        $targets = [
            'client' => ['suffix' => 'thumb', 'width' => 64, 'height' => 64],
            'pi'     => ['suffix' => 'avatar', 'width' => 160, 'height' => 160],
            'work'   => ['suffix' => 'grid', 'width' => 400, 'height' => 300],
        ];

        foreach ($targets as $folder => $config) {
            $folderPath = $basePath . '/' . $folder;

            if (!File::exists($folderPath)) {
                $this->warn("Folder $folderPath does not exist, skipped.");
                continue;
            }

            $files = File::files($folderPath);

            foreach ($files as $file) {
                $ext = strtolower($file->getExtension());
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) continue;

                $filenameWithoutExt = $file->getFilenameWithoutExtension();
                $newName = $filenameWithoutExt . '-' . $config['suffix'] . '.webp';
                $newPath = $folderPath . '/' . $newName;

                if (file_exists($newPath)) {
                    $this->line("✔ $newName already exists, skipped.");
                    continue;
                }

                try {
                    Image::make($file->getRealPath())
                        ->resize($config['width'], $config['height'], function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->encode('webp', 100)
                        ->save($newPath);

                    $this->info("✅ Created: $newName");
                } catch (\Exception $e) {
                    $this->error("⚠ Error processing {$file->getFilename()}: " . $e->getMessage());
                }
            }
        }

        $this->info("Done resizing images!");
    }
}
