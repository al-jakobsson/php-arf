<?php

namespace Views;

use Arf\View;

?>


<?php View::render('Components/DefaultPageHeader', ['title' => 'User not found']) ?>
<?php View::render('Components/Navbar') ?>

<main>
    <h1>Couldn't find the user you were looking for.</h1>
    <a href="/users">Back to users</a>
</main>

<?php View::render('Components/DefaultPageFooter') ?>