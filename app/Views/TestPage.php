<?php

namespace Views;

use Arf\View;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>

</head>
<body>
    <?php View::render('Components/TestNavbar');?>

    <ul>
        <li>test</li>
        <li>test 2</li>
        <li>test 3</li>
    </ul>

    <?php foreach ([1, 2, 3] as $e): ?>
        <div>a</div>
    <?php endforeach; ?>

</body>
</html>