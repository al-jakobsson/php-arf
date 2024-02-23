<?php namespace Views;?>

{foreach [1, 2, 3, 4] as $num:}
    {if $num % 2 === 0:}
    <div>hello</div>
    {/if}
{/foreach}
