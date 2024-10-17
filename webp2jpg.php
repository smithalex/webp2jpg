<?php

/**
 * Converts webp images from a directory to jpeg
 *
 * Provide filename of the webp file
 * Script will generate the file with the same name and '.jpg' extension
 *
 * Example run
 * ```
 * php webp2jpg.php example.webp
 * ```
 */

include_once("util.php");

// Expect argument 1 to be a file path
if (!isset($argv[1])) {
    echo "Missing file name to process\n";
    return;
}
$filename = $argv[1];
convertFile($filename);
