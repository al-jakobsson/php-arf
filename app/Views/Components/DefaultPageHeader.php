<?php

namespace Views\Components;

use Arf\Safe;
use Arf\View;

/**
 * pageData:
 * @var string $title The title of the page.
 * @var string[] $stylesheets List of urls to CSS stylesheets to include.
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Safe::html($title ?? "Title") ?></title>
    <?php View::includeStylesheets($stylesheets ?? []); ?>

</head>
<body>
