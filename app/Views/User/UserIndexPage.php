<?php

namespace Views;

use Arf\View;
use Models\User;

/** @var string $title The title of the page */
/** @var User[] $users The list of all users */
?>

<?php View::render('Components/DefaultPageHeader', ['title' => $title]); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1><safe>$title ?? 'Users index page'</safe></h1>

    <ul>
    <foreach $users as $user: >
        <li>
            <a href="/users/<safe>$user->id</safe>">
                <safe>$user->name</safe>
            </a>
        </li>
    </foreach>
    </ul>

</main>

<?php View::render('Components/DefaultPageFooter'); ?>