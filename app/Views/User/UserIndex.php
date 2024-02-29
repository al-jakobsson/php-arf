<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\User;

/** @var string $title The title of the page */
/** @var User[] $users The list of all users */
?>

<?php View::render('Components/DefaultPageHeader', ['title' => $title]); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1><?= Safe::html($title ?? 'Users')?></h1>

    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <a href="/users/<?= Safe::html($user->id) ?>">
                    <?= Safe::html($user->name) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>

</main>

<?php View::render('Components/DefaultPageFooter'); ?>