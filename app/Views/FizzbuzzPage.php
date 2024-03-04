<?php

namespace Views;

use Arf\Safe;
use Arf\View;
use Models\Fizzbuzz;

/**
 * pageData
 * @var Fizzbuzz $fizzbuzz
 */

?>

<?php
View::render(
    view: 'Components/DefaultPageHeader',
    pageData: [
        'title' => 'Fizzbuzz!',
        'stylesheets' => ['/css/fizzbuzz.css']
    ]
);
?>

<?php View::render('Components/Navbar') ?>

<main id="fizzbuzz">
    <h1>Fizzbuzz!</h1>
    <ul>
<?php foreach (range(1, $fizzbuzz->count) as $number): ?>
        <li class="<?= Safe::html($fizzbuzz->getFizzbuzzClass($number)) ?>">
            <?= Safe::html($fizzbuzz->getFizzbuzzValue($number) . PHP_EOL) ?>
        </li>
<?php endforeach ?>
    </ul>
</main>

<?php View::render('Components/DefaultPageFooter') ?>