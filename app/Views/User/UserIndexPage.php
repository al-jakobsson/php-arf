<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\User;

/**
 * pageData:
 * @var string $title The title of the page
 * @var User[] $users The list of all users
 */

?>

<?php
View::render(
    view: 'Components/DefaultPageHeader',
    pageData: [
        'title' => $title,
        'stylesheets' => ['/css/user.css']
    ]
);
?>

<?php View::render('Components/Navbar'); ?>

<main>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="/users">Users</a></li>
            <li class="crumb">All users</li>
        </ol>
    </nav>
    <h1><?= Safe::html($title) ?></h1>
    <ul>

    <?php foreach ($users as $user): ?>
        <li>
            <a href="/users/<?= Safe::param($user->id) ?>"><?= Safe::html($user->name) ?></a>
        </li>
    <?php endforeach ?>

    </ul>

</main>

<?php View::render('Components/DefaultPageFooter'); ?>