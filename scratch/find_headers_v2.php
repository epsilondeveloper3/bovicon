<?php
$content = file_get_contents("https://www.pathvets.in/_next/static/chunks/pages/_app-077d2662da89f8d9.js");

// Search for COMPANYID
$pos = 0;
while (($pos = strpos($content, "COMPANYID", $pos)) !== false) {
    echo "Found 'COMPANYID' at position $pos:\n" . substr($content, $pos - 100, 250) . "\n\n";
    $pos += 9;
    if ($pos > 200000) break;
}

// Search for DATA_AREA_ID
$pos = 0;
while (($pos = strpos($content, "DATA_AREA_ID", $pos)) !== false) {
    echo "Found 'DATA_AREA_ID' at position $pos:\n" . substr($content, $pos - 100, 250) . "\n\n";
    $pos += 12;
    if ($pos > 200000) break;
}
