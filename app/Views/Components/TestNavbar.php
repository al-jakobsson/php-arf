<?php

namespace Views\Components;

use Arf\View;

?>

<nav>
    <style>
        @scope {
            ul:first-of-type {
                display: flex;
                align-items: center;
                margin: 20px;
            

                li {
                    list-style-type: none;
                    margin: 10px;
                }

                div.square {
                    height: 30px;
                    width: 30px;
                    background-color: red;
                }
            }

        }
    </style>
    <ul>
        <li>
            <div class="square"></div>
        </li>
        <li><a href="Home">Home</a></li>
        <li><a href="Home">About</a></li>
        <li><a href="Home">Contact</a></li>
    </ul>

    <?php View::render('Components/SecondTestNavbar'); ?>
</nav>