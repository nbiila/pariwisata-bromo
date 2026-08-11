<?php

use Illuminate\Support\Facades\Storage;

function fotoProfil($userId): ?string
{
    foreach (['jpg', 'jpeg', 'png'] as $ext) {
        $path = "profil/{$userId}.{$ext}";
        if (Storage::disk('public')->exists($path)) {
            return asset("storage/{$path}");
        }
    }
    return null;
}