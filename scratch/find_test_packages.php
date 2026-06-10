<?php
$chunks = [
    "webpack-d7a504762e95df26.js",
    "framework-acd67e14855de5a2.js",
    "main-62a5bcb5d940e2e2.js",
    "pages/_app-077d2662da89f8d9.js",
    "838-d3c4d095a9668177.js",
    "pages/test-and-packages-81a3de695d250c4e.js"
];

foreach ($chunks as $chunk) {
    $url = "https://www.pathvets.in/_next/static/chunks/" . $chunk;
    $content = file_get_contents($url);
    if (!$content) continue;
    
    $pos = strpos($content, "6988:");
    if ($pos !== false) {
        echo "Found module 6988 in $chunk at position $pos:\n";
        echo substr($content, $pos - 100, 400) . "\n\n";
    }
}
