<?php

declare(strict_types=1);

namespace Scripts;

use TimAlexander\Bavarian\Translator;

require_once __DIR__ . '/../vendor/autoload.php';

$translator = new Translator();

while (true) {
    echo 'Enter text to translate (or "exit" to quit): ';
    $input = trim(fgets(STDIN));

    if ($input === 'exit') {
        break;
    }

    $translated = $translator->translate($input);
    echo "Translated: $translated\n";
}
