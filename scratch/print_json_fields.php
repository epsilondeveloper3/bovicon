<?php
$data = json_decode(file_get_contents("c:\\xampp\\htdocs\\bovicon\\scratch\\pathvets_data.json"), true);

echo "Category structure:\n";
print_r(array_slice($data['categories'], 0, 1));

echo "\nTest structure:\n";
print_r(array_slice($data['tests'], 0, 1));
