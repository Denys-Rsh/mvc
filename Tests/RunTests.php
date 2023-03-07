<?php

spl_autoload_register(function ($className) {
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = realpath(sprintf('%s/../%s.php', __DIR__, $fileName));

    include_once $filePath;
});

(new Tests\PageTest())
    ->testIndex()
    ->testShow()
    ->testShow404();
