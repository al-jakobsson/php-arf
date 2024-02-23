<?php

namespace Views\Components;

use Arf\Safe;

/** @var string $title pageData -- The title of the page. */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Safe::html($title ?? "Title") ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
