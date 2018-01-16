<?php

function formatDataForCSV(array $data): string
{
    $result = array_map(function ($item) {
        return implode(',', (array)$item) . "\n";
    }, $data);

    return implode(',', $result) . "\n";
}
