<?php

namespace App\Http\traits;

trait media
{
    public function UploadPhoto($image, $folder)
    {
        $PhotoName = uniqid() . '.' . $image->extension();
        $image->move(public_path('/dist/img/' . $folder), $PhotoName);
        return $PhotoName;
    }

    public function DeletePhoto($path_image)
    {
        if (file_exists($path_image)) {
            unlink($path_image);
        }
    }
}
