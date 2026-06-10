<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

// Search for rn = or function rn
$pos = strpos($content, "rn=async");
if ($pos === false) {
    $pos = strpos($content, "rn=");
}
if ($pos !== false) {
    echo "rn= context:\n" . substr($content, $pos - 150, 400) . "\n\n";
}

// Search for rt = or function rt
$pos2 = strpos($content, "rt=");
if ($pos2 !== false) {
    echo "rt= context:\n" . substr($content, $pos2 - 150, 400) . "\n\n";
} else {
    $pos3 = strpos($content, "function rt");
    if ($pos3 !== false) {
        echo "function rt context:\n" . substr($content, $pos3 - 150, 400) . "\n\n";
    }
}
