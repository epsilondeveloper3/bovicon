<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

$pos = strpos($content, "https://dlplonere-gateway.lalpathlabs.com/gateway/re/v1");
if ($pos !== false) {
    echo "Context before and after:\n" . substr($content, $pos - 300, 600) . "\n\n";
}
