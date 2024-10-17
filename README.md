# webp2jpg
PHP script to convert WEBP images to JPG

Based on Examples for PHP GD library
https://www.php.net/manual/en/function.imagecreatefromwebp.php#refsect1-function.imagecreatefromwebp-examples
```php
<?php
// Load the WebP file
$im = imagecreatefromwebp('./example.webp');

// Convert it to a jpeg file with 100% quality
imagejpeg($im, './example.jpeg', 100);
imagedestroy($im);
?>
```

## Requirements
PHP with GD extension installed
```bash
php -m | grep gd
```

## How to run
To convert a sinlge image
```bash
php webp2jpg.php example.webp
```

To convert images in a directory
```bash
php webp2jpgDir.php /path/to/images/
```
