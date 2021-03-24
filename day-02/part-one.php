<?php

declare(strict_types=1);

/** @var string $entriesString */
$entriesString = file_get_contents(__DIR__ . '/entries.txt');

$entries = explode("\n", $entriesString);

$count = 0;

foreach ($entries as $entry) {
    if (empty($entry)) {
        continue;
    }

    list($range, $character, $expression) = explode(" ", $entry);

    list($min, $max) = explode("-", $range);

    $character = substr($character, 0, 1);

    $occurrencesCount = substr_count($expression, $character);
    if ($occurrencesCount >= $min && $occurrencesCount <= $max) {
        $count++;
    }
}

echo $count;

