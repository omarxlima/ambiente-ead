<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public function store(UploadedFile $file, string $path)
    {
        return $file->store($path);
    }

    public function storeAs(UploadedFile $file, string $path, string $customName)
    {
        return $file->storeAs($path, $customName);
    }

    public function removeFile(string $filePath): bool
    {
        if (Storage::exists($filePath))
            Storage::delete($filePath);
            return false;
    }
}
