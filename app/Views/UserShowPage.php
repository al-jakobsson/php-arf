<?php

namespace Views;

use Arf\Safe;
use Arf\View;

/** @var int $id pageData -- The user id */

?>

<?php View::render('Components/DefaultPageHeader'); ?>
<?php View::render('Components/Navbar'); ?>

<main>
    <h1>User <?= Safe::html($id ?? 0) ?></h1>
</main>

<?php View::render('Components/DefaultPageFooter'); ?>



