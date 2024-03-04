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
    <img src="/images/arf-logo.png" alt="Arf logo" height="400px">
    <p>Welcome to your first Arf page.</p>

    <h3>Example pages:</h3>
    <ul>
        <li>
            A <a href="https://en.wikipedia.org/wiki/Create,_read,_update_and_delete">CRUD</a> example: <a href="/users">Users</a>
        </li>
        <li>A silly <a href="/fizzbuzz">Fizzbuzz</a> example</li>
    </ul>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>
