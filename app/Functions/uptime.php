<?php

function uptime($t) {
    $e = strpos($t, "w");
    $s = strpos($t, "d");
    $n = strpos($t, "h");
    $r = strpos($t, "m");
    $i = strpos($t, "s");

    $weak = 0;
    $day = 0;
    $hour = 0;
    $minute = 0;
    $sec = 0;

    if ($e !== false) {
        $weak = 7 * intval(substr($t, 0, $e));
        $t = substr($t, $e + 1);
    }

    if ($s !== false) {
        $day = intval(substr($t, 0, $s - $e - 1));
        $t = substr($t, $s + 1);
    }

    if ($n !== false) {
        $hour = intval(substr($t, 0, $n - $s - 1));
        $t = substr($t, $n + 1);
    }

    if ($r !== false) {
        $minute = intval(substr($t, 0, $r - $n - 1));
        $t = substr($t, $r + 1);
    }

    if ($i !== false) {
        $sec = intval(substr($t, 0, $i - $r - 1));
    }

    $uptime = "";

    if ($day > 0) {
        $uptime .= $day . "d ";
    }

    if ($hour < 10) {
        $uptime .= "0";
    }
    $uptime .= $hour . ":";

    if ($minute < 10) {
        $uptime .= "0";
    }
    $uptime .= $minute . ":";

    if ($sec < 10) {
        $uptime .= "0";
    }
    $uptime .= $sec;

    return $uptime;
}


