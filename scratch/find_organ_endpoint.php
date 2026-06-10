<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

$pos = strpos($content, "TEST_PACKAGES_BY_ORGAN");
if ($pos !== false) {
    echo "TEST_PACKAGES_BY_ORGAN context:\n" . substr($content, $pos - 100, 300) . "\n\n";
}
