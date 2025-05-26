<?php

namespace Permify;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Finder\SplFileInfo;

#[AsCommand(name: 'permify:controllers')]
class ControllersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permify:controllers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold the authentication controllers';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/../stubs/Auth'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        // Admin role and permission controller
        if (! is_dir($adminDirectory = app_path('Http/Controllers/Admin'))) {
            mkdir($adminDirectory, 0755, true);
        }

        $adminFilesystem = new Filesystem;

        collect($adminFilesystem->allFiles(__DIR__.'/../stubs/Admin'))
            ->each(function (SplFileInfo $adminFile) use ($adminFilesystem) {
                $adminFilesystem->copy(
                    $adminFile->getPathname(),
                    app_path('Http/Controllers/Admin/'.Str::replaceLast('.stub', '.php', $adminFile->getFilename()))
            );
        });

        // Middleware attachment
        if (! is_dir($middlewareDirectory = app_path('Http/Middleware'))) {
            mkdir($middlewareDirectory, 0755, true);
        }

        $middlewareFilesystem = new Filesystem;

        collect($middlewareFilesystem->allFiles(__DIR__.'/../stubs/Middleware'))
            ->each(function (SplFileInfo $middlewareFile) use ($middlewareFilesystem) {
                $middlewareFilesystem->copy(
                    $middlewareFile->getPathname(),
                    app_path('Http/Middleware/'.Str::replaceLast('.stub', '.php', $middlewareFile->getFilename()))
            );
        });

        // Model Attachment
        if (! is_dir($model = app_path('Models'))) {
            mkdir($model, 0755, true);
        }

        $modelFilesystem = new Filesystem;

        collect($modelFilesystem->allFiles(__DIR__.'/../stubs/Models'))
            ->each(function (SplFileInfo $modelFile) use ($modelFilesystem) {
                $modelFilesystem->copy(
                    $modelFile->getPathname(),
                    app_path('Models/'.Str::replaceLast('.stub', '.php', $modelFile->getFilename()))
                );
            });

        // Traits Attachment
        if (! is_dir($model = app_path('Traits'))) {
            mkdir($model, 0755, true);
        }

        $modelFilesystem = new Filesystem;

        collect($modelFilesystem->allFiles(__DIR__.'/../stubs/Traits'))
            ->each(function (SplFileInfo $modelFile) use ($modelFilesystem) {
                $modelFilesystem->copy(
                    $modelFile->getPathname(),
                    app_path('Traits/'.Str::replaceLast('.stub', '.php', $modelFile->getFilename()))
                );
            });


        $this->components->info('Authentication scaffolding generated successfully.');
    }
}
