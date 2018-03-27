<?php

spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/../src/';

    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    // var_dump($file);
    // die();
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});