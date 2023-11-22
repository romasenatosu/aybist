<?php

// get URL parameters
$locale = htmlspecialchars($_GET['locale'] ?? '');
$page = htmlspecialchars($_GET['page'] ?? '');
$action = htmlspecialchars($_GET['action'] ?? '');
$id = filter_var(htmlspecialchars($_GET['id'] ?? ''), FILTER_VALIDATE_INT);
