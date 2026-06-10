<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/838-d3c4d095a9668177.js");

$pos = strpos($content, "6988:");
if ($pos !== false) {
    echo "Module 6988 context:\n" . substr($content, $pos, 1500) . "\n\n";
}
