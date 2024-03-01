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

<?php View::render('Components/DefaultPageHeader') ?>
<?php View::render('Components/Navbar') ?>

<main>
    <style>
        @scope {
            ul {
                height: 400px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            li {
                list-style-type: none;
                margin: 10px;
            }

            .red {
                color: red;
                font-weight: bold;
            }

            .blue {
                color: var(--arf-blue);
                font-weight: bold;
            }

            .green {
                color: green;
                font-weight: bold;
            }
        }
    </style>

    <h1>Fizzbuzz!</h1>
    <ul>

    <?php foreach (range(1, $fizzbuzz->count) as $number): ?>
        <li class="<?= Safe::html( $fizzbuzz->getFizzbuzzClass($number) ) ?>">
            <?= Safe::html( $fizzbuzz->getFizzbuzzValue($number) ) ?>
        </li>
    <?php endforeach ?>


    </ul>
</main>

<?php View::render('Components/DefaultPageFooter') ?>