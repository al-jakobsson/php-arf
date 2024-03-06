<?php

namespace Views\Components;

use Arf\Safe;
use Models\StatusMessage;

/**
 * pageData:
 * @var StatusMessage $statusMessage A status message to display.
 */

?>

<p class="flash-message <?= $statusMessage->success ? "success" : "failed" ?>">
    <?= Safe::html($statusMessage->message) ?>
</p>
