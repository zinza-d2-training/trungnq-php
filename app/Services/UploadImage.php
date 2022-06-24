<?php

namespace App\Services;

class UploadImage
{
    /**
     * 
     */
    public function savefile($path, $file)
    {
        $file_name = time() . '-avatar.' . $file->extension();
        $res = $file->storeAs($path, $file_name);

        return $file_name;
    }

    public function deletefile($path)
    {
        if (file_exists($path)) {
            unlink($path);

            return true;
        }

        return false;
    }
}
