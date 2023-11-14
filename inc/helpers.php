<?php

function print_pre(string $buff): void {
    echo '<pre>';
    print_r($buff);
    echo '</pre>';
}
