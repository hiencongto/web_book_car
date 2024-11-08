<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ImageService
{
    /**
     * @param UploadedFile $image
     * @param string $url_folder
     * @return string
     */
    public function addNewImage(UploadedFile $image, string $url_folder)
    {
        $image_name = time() . '_' . $image->getClientOriginalName();
        $image->move($url_folder, $image_name);

        return $image_name;
    }

    /**
     * @param string $old_image
     * @param string $url_folder
     * @return void
     */
    public function deleteImage(string $old_image, string $url_folder)
    {
        if (is_numeric(substr($old_image, 0, 9))) {
            $old_image_path = public_path() . '\\' . $url_folder . '\\' . $old_image;
            File::delete($old_image_path);
        }
    }
}
