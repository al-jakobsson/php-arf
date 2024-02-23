<?php

namespace Arf;

class SealTemplateEngine
{
    public static function parse($templateFilePath)
    {
        $template = file_get_contents($templateFilePath); // Load your template

        // Replace custom tags with PHP code
        $phpCode = str_replace(
            ['{foreach ', ':}', '{/foreach}', '{if ', '{/if}'],
            ['<?php foreach (', '): ?>', '<?php endforeach; ?>', '<?php if (', '<?php endif; ?>'],
            $template
        );

        ob_start();
        eval('?>' . $phpCode);
        $output = ob_get_clean();

        return $output;
    }
}
