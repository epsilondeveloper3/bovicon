<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

$pos = strpos($content, "rf.interceptors.request.use");
if ($pos !== false) {
    echo "Context before rf.interceptors:\n" . substr($content, $pos - 1500, 1500) . "\n\n";
}
