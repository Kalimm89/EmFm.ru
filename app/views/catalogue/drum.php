<?php
$file = __DIR__ . '/products_inc.php';
if (file_exists($file)) {
    include $file;
} else {
    echo "<img src='/public/images/errors/404.jpg'>";
}