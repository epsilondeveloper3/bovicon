<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

echo "Interceptor Scope Content:\n";
echo substr($content, 174000, 1500) . "\n";
