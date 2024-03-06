<?php

namespace Views\Components;

/** @var string $CSRFToken pageData -- The CSRF token to prevent cross site forgery attacks */

?>

<input type="hidden" name="csrf_token" value="<?= $CSRFToken ?>">
