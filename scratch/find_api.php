<?php
// Temporary script to find API url in pathvets js bundles
$chunks = [
    "webpack-d7a504762e95df26.js",
    "framework-acd67e14855de5a2.js",
    "main-62a5bcb5d940e2e2.js",
    "pages/_app-077d2662da89f8d9.js",
    "838-d3c4d095a9668177.js",
    "pages/test-and-packages-81a3de695d250c4e.js"
];

foreach ($chunks as $chunk) {
    echo "--- Checking $chunk ---\n";
    $url = "https://www.pathvets.in/_next/static/chunks/" . $chunk;
    $content = file_get_contents($url);
    if (!$content) {
        echo "Failed to fetch $chunk\n";
        continue;
    }

    // Search for CAT_List or axios baseURL or API_URL
    if (preg_class_search($content, "/CAT_List/")) {
        echo "Found CAT_List in $chunk!\n";
    }
    
    // Find URL-like strings
    preg_match_all("/https?:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,}(?::[0-9]+)?\/[^\s\"']*/", $content, $matches);
    if (!empty($matches[0])) {
        echo "URLs found:\n";
        foreach (array_unique($matches[0]) as $foundUrl) {
            echo "  $foundUrl\n";
        }
    }
    
    // Search for base urls or api paths
    preg_match_all("/(?:baseURL|base_url|api_url|host|api)\s*:\s*[\"']([^\"']+)[\"']/i", $content, $matches2);
    if (!empty($matches2[1])) {
        echo "Base URL mappings:\n";
        foreach (array_unique($matches2[1]) as $val) {
            echo "  $val\n";
        }
    }
    
    // Let's print out around CAT_List occurrences
    $pos = strpos($content, "CAT_List");
    if ($pos !== false) {
        echo "CAT_List context: " . substr($content, max(0, $pos - 100), 200) . "\n";
    }
}

function preg_class_search($str, $pattern) {
    return preg_match($pattern, $str);
}
