<?php

/**
 * Converts file from WEBP to JPG
 *
 * Creates a new .jpg file with the same name in the same directory based on the original .webp file
 *
 * @param string $filename - path to the webp file
 *
 * @see https://www.php.net/manual/en/function.imagecreatefromwebp.php#refsect1-function.imagecreatefromwebp-examples
 */
function convertFile($filename)
{
    // Skip . .. and subdirectories
    if (is_dir($filename)) {
        return;
    }

    if (!file_exists($filename)) {
        echo "File '$filename' is not found\n";
        return;
    }

    // Expect file to be a webp image (naive)
    if (substr($filename, -5, 5) != '.webp') {
        echo "File '$filename' is not a WEBP image\n";
        return;
    }

    // Expect result file name doesn't exist
    $result_filename = substr($filename, 0, strlen($filename) - 5) . '.jpg';
    if (file_exists($result_filename)) {
        echo "Result file '$result_filename' already exists, can't replace it\n";
        return;
    }

    try {
        $image = imagecreatefromwebp($filename);
    } catch (Throwable $t) {
        echo "Can't read file '$filename' as WEBP image\n";
        return;
    }
    if (!$image) {
        echo "Can't read file '$filename' as WEBP image\n";
        return;
    }
    $result_code = imagejpeg($image, $result_filename, 100);
    if (!$result_code) {
        echo "Can't convert '$filename' to JPEG\n";
        imagedestroy($image);
        return;
    }
    imagedestroy($image);

    echo "Generated image '$result_filename' based on '$filename'\n";
}
