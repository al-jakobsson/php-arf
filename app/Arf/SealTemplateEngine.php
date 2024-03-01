<?php

namespace Arf;

class SealTemplateEngine
{
    public static function parse($templateFilePath, array $pageData = [])
    {
        extract($pageData);

        /** Load the template file */
        $template = file_get_contents($templateFilePath);

        /** Replace custom tags with PHP code */
        $phpCode = str_replace(
            ['<foreach ', ': >', '</foreach>', '<if ', '</if>', '<elseif ', '</elseif>', '<else>', '</else>', '<safe>', '</safe>'],
            ['<?php foreach (', '): ?>', '<?php endforeach; ?>', '<?php if (', '<?php endif; ?>', '<?php elseif (', '', '<?php else: ?>', '', '<?= htmlspecialchars(', ') ?>'],
            $template
        );

        /** Evaluate PHP code in buffer and return the result */

        ob_start();

        eval('?>' . $phpCode);

        return ob_get_clean();
    }
}