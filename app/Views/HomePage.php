<?php

namespace Views;

use Arf\View;
use Arf\Safe;

/** @var string $heading pageData -- The page heading */

?>

<?php View::render('Components/DefaultPageHeader', ['title' => 'Welcome!']); ?>
<?php View::render('Components/Navbar'); ?>

<div class="centered">
    <h1><?= Safe::html($heading ?? 'Home') ?></h1>
    <p>Welcome to your first Arf page.</p>
</div>

<?php View::render('Components/DefaultPageFooter'); ?>
