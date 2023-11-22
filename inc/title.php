<?php

define('default_title', 'Aybist');
$title = default_title;

/**
 * Changes title of sub pages
 * 
 * @param string subtitle
 * @return string newtitle
 */
function changeTitle(string $subtitle=""): string {
    $title = default_title;

    if (strlen($subtitle) > 0) {
        $title = default_title . ' | ' . $subtitle;
    }

    return $title;
}
