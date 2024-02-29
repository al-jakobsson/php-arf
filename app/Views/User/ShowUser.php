<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\User;

/** @var User $user pageData -- The user to show */

?>

<?php View::render('Components/DefaultPageHeader'); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1><?= Safe::html($user->name) ?></h1>
    <ul>
        <li>ID: <?= Safe::html($user->id) ?></li>
        <li>Email: <?= Safe::html($user->email) ?></li>
    </ul>
    <a href="/users">Back to users</a>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>



