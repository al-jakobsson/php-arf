<?php

namespace Views;

use Arf\View;
use Arf\Safe;

/** @var string $heading pageData -- The page heading */

?>

<?php View::render('Components/DefaultPageHeader', ['title' => 'Welcome!']); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1><?= Safe::html($heading ?? 'Home') ?></h1>
    <img src="/images/arf-logo-3.png" alt="Arf logo" height="300px">
    <p>Welcome to your first Arf page.</p>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>
