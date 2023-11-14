<?php

function print_pre(mixed $buff): void {
    echo '<pre>';
    print_r($buff);
    echo '</pre>';
}
