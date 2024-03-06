<?php

namespace Views;

use Arf\Safe;
use Arf\View;

/**
 * pageData:
 * @var string $title The page title
 * @var string[] $stylesheets List of urls to stylesheets to include
 */

?>

<?php View::render(view: 'Components/DefaultPageHeader', pageData: ['title' => $title, 'stylesheets' => $stylesheets]); ?>
<?php View::render(view: 'Components/Navbar'); ?>

<main>
    <nav class="crumbs">
        <ol>
            <li class="crumb"><a href="/users">Users</a></li>
            <li class="crumb">Create user</li>
        </ol>
    </nav>
    <h1>Create new user</h1>
    <form action="/users/store" method="post">

        <?php Safe::csrf() ?>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <input type="submit" value="Submit">
    </form>

</main>

<?php View::render(view: 'Components/DefaultPageFooter'); ?>



