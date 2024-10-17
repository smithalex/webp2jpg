<?php

/**
 * Convert webp images in a directory to jpg
 *
 * Provide directory path with of the webp files
 * Script will generate the file with the same name and '.jpg'
 * extension in the directory
 *
 * Example run
 * ```
 * php webp2jpgDir.php test_assets/
 * ```
 */

include_once("util.php");

// Expect argument 1 to be a dir path
if (!isset($argv[1])) {
    echo "Missing directory name to process\n";
    return;
}

$directory = $argv[1];
if (!is_dir($directory)) {
    echo "Provided '$directory' is not a directory\n";
    return;
}

foreach (scandir($directory) as $plain_filename) {
    $filename = $directory . $plain_filename;
    convertFile($filename);
}
