<?php

// get URL parameters
$page = htmlspecialchars($_GET['page'] ?? '');
$action = htmlspecialchars($_GET['action'] ?? '');
$id = filter_var(htmlspecialchars($_GET['id'] ?? ''), FILTER_VALIDATE_INT);
$locale = htmlspecialchars($_GET['locale'] ?? '');
