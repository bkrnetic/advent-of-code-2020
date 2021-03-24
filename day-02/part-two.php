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

    list($firstPosition, $secondPosition) = explode("-", $range);

    if ($firstPosition === 0 || $secondPosition === 0) {
        continue;
    }

    $character = substr($character, 0, 1);

    $characterOnFirstPosition = substr($expression, $firstPosition-1, 1);
    $characterOnSecondPosition = substr($expression, $secondPosition-1, 1);

    $chars = [
        $characterOnFirstPosition === false ? '' : $characterOnFirstPosition,
        $characterOnSecondPosition === false ? '' : $characterOnSecondPosition,
    ];

    $counts = array_count_values($chars);

    if (isset($counts[$character]) && $counts[$character] === 1) {
        $count++;
    }
}

var_dump($count);

