<?php

namespace Views;

use Arf\Safe;

/** @var string $heading pageData -- The page heading */

?>

<div class="center">
    <h1><?= Safe::html($heading ?? 'Home') ?></h1>
    <p>Welcome to your first Arf page.</p>
</div>
