<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

// Let's find where axios config is defined. We saw l(1843) was imported.
// Let's search for "headers" or "axios" or "interceptors"
$pos = 0;
while (($pos = strpos($content, "headers", $pos)) !== false) {
    echo "Found 'headers' at position $pos:\n" . substr($content, $pos - 100, 250) . "\n\n";
    $pos += 7;
    if ($pos > 200000) break; // Limit
}
