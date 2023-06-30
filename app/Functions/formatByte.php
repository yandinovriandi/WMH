<?php

function formatByte($bytes): string
{
    $i = floor(log($bytes, 1024));

    return round($bytes / pow(1024, $i), [0, 0, 2, 2, 3][$i]).['B', 'kB', 'MB', 'GB', 'TB'][$i];
}
