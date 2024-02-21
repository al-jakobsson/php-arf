<?php

namespace Views;

use Core\Safe;

/** @var string $title pageData -- The title of the page */
/** @var string $heading pageData -- The page heading */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Safe::html($title ?? "Title") ?></title>
</head>
<body>
    <h1><?= Safe::html($heading ?? 'Home') ?></h1>
    <p>This is an Arf! page</p>
</body>
</html>