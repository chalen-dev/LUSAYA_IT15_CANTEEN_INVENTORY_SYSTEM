<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class ViewManager
{
    public function create($name, $command) {
        $path = resource_path("views/" . str_replace('.', '/', $name) . ".blade.php");

        if (File::exists($path)) {
            $command->error("View already exists!");
            return;
        }

        File::ensureDirectoryExists(dirname($path));
        File::put($path, "");
        $command->info("View created successfully.");
    }
}
