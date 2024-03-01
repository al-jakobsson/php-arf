<?php

namespace Views;

?>

<ul>
<foreach range(1, 100) as $number: >
    <if $number % 15 === 0: >
        <li>fizzbuzz</li>
    <elseif $number % 5 === 0: >
        <li>buzz</li>
    <elseif $number % 3 === 0: >
        <li>fizz</li>
    <else>
        <li><safe>$number</safe></li>
    </if>
</foreach>
</ul>
