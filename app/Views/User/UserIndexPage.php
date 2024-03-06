<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\StatusMessage;
use Models\User;

/**
 * pageData:
 * @var string $title The title of the page
 * @var string[] $stylesheets The list of urls to stylesheets to include
 * @var ?StatusMessage $statusMessage An optional status message to display
 * @var User[] $users The list of all users
 */

?>

<?php View::render(view: 'Components/DefaultPageHeader', pageData: ['title' => $title, 'stylesheets' => $stylesheets]); ?>
<?php View::render(view: 'Components/Navbar'); ?>

<main>

    <?php if ($statusMessage): ?>
        <?php View::render(view: 'Components/FlashMessage', pageData: ['statusMessage' => $statusMessage]); ?>
    <?php endif ?>

    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="/users">Users</a></li>
            <li class="crumb">All users</li>
        </ol>
    </nav>
    <h1><?= Safe::html($title) ?></h1>
    <a href="/users/create">Create a new user</a>
    <ul>

    <?php foreach ($users as $user): ?>
        <li>
            <a href="/users/<?= Safe::param($user->id) ?>"><?= Safe::html($user->name) ?></a>
        </li>
    <?php endforeach ?>

    </ul>

</main>

<?php View::render(view: 'Components/DefaultPageFooter'); ?>