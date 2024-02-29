<?php

namespace Views;

use Arf\Safe;
use Arf\View;

/** @var string $title The title of the page */
?>

<?php View::render('Components/DefaultPageHeader', ['title' => $title]); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1><?= Safe::html($title ?? 'User page')?></h1>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>