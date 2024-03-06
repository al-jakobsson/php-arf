<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\User;

/**
 * pageData:
 * @var string $title The page title
 * @var string[] $stylesheets List of urls to stylesheets to include
 * @var User $user The user to show
 */

?>

<?php View::render('Components/DefaultPageHeader', ['title' => $title, 'stylesheets' => $stylesheets]); ?>

<?php View::render('Components/Navbar'); ?>

<main>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="/users">Users</a></li>
            <li class="crumb"><?= Safe::html($user->name) ?></li>
        </ol>
    </nav>
    <h1><?= Safe::html($user->name) ?></h1>
    <ul>
        <li>ID: <?= Safe::html($user->id) ?></li>
        <li>Name: <?= Safe::html($user->name) ?></li>
        <li>Email: <?= Safe::html($user->email) ?></li>
        <li>Date and time created: <?= Safe::html($user->created_at) ?></li>
    </ul>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>



