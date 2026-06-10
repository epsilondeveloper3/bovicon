<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

// Search for 1843:
$pos = strpos($content, "1843:");
if ($pos !== false) {
    echo "1843: context:\n" . substr($content, $pos - 100, 300) . "\n\n";
}
