<?php
$logoPath = __DIR__ . '/../assets/images/logo/logo-dark.png';
if (!file_exists($logoPath)) {
    echo "Logo file not found.\n";
    exit;
}

$im = imagecreatefrompng($logoPath);
if (!$im) {
    echo "Failed to load PNG.\n";
    exit;
}

$w = imagesx($im);
$h = imagesy($im);

$colors = [];
for ($x = 0; $x < $w; $x += 4) {
    for ($y = 0; $y < $h; $y += 4) {
        $rgb = imagecolorat($im, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        $alpha = ($rgb >> 24) & 0x7F;

        // Skip fully transparent pixels
        if ($alpha > 100) continue;

        // Skip pure white or near-white/near-black pixels if looking for brand colors
        if ($r > 240 && $g > 240 && $b > 240) continue;
        if ($r < 15 && $g < 15 && $b < 15) continue;

        // Round RGB values to group similar colors
        $roundedR = round($r / 10) * 10;
        $roundedG = round($g / 10) * 10;
        $roundedB = round($b / 10) * 10;

        $key = sprintf("#%02x%02x%02x", $r, $g, $b);
        $roundedKey = sprintf("#%02x%02x%02x", $roundedR, $roundedG, $roundedB);

        if (!isset($colors[$roundedKey])) {
            $colors[$roundedKey] = ['count' => 0, 'exact' => []];
        }
        $colors[$roundedKey]['count']++;
        if (!isset($colors[$roundedKey]['exact'][$key])) {
            $colors[$roundedKey]['exact'][$key] = 0;
        }
        $colors[$roundedKey]['exact'][$key]++;
    }
}

arsort($colors);
echo "Dominant colors grouped:\n";
$i = 0;
foreach ($colors as $rounded => $data) {
    arsort($data['exact']);
    $exactHex = key($data['exact']);
    echo "$exactHex (grouped under $rounded) - Count: {$data['count']}\n";
    if (++$i >= 10) break;
}
?>
