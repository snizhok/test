<?php

/**
 * Разработать php-скрипт, отображающий сам себя без использования функций чтения файлов.
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

highlight_file(__FILE__);