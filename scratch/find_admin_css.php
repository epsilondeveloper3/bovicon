<?php
$css = file_get_contents("c:\\xampp\htdocs\\bovicon\\admin\\style.css");

$pos = 0;
while (($pos = strpos($css, "active", $pos)) !== false) {
    if (strpos(substr($css, max(0, $pos - 50), 100), "sidebar-menu") !== false) {
        echo "Found active context around sidebar-menu at position $pos:\n" . substr($css, $pos - 100, 300) . "\n\n";
    }
    $pos += 6;
    if ($pos > 200000) break;
}
