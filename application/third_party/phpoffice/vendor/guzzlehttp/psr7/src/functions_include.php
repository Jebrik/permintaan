<?php

namespace PixelCaffeine\Dependencies;

// Don't redefine the functions if included multiple times.
if (!\function_exists('PixelCaffeine\\Dependencies\\GuzzleHttp\\Psr7\\str')) {
    require __DIR__ . '/functions.php';
}
