<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

// Search for createAuth
$pos = 0;
while (($pos = strpos($content, "createAuth", $pos)) !== false) {
    echo "Found 'createAuth' at position $pos:\n" . substr($content, $pos - 150, 300) . "\n\n";
    $pos += 10;
    if ($pos > 200000) break;
}
