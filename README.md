# Bavarian Translator

Translate German text into the Bavarian dialect using rule-based transformations. This package focuses on idiomatic and phonetic conversions to simulate spoken Bavarian in a readable written form.

## Requirements

- PHP 8 or higher  

## Installation

```bash
composer require timanthonyalexander/german-to-bavarian
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use TimAlexander\Bavarian\Translator;

$translator = new Translator();

$text = 'Ich habe heute einen guten Tag und möchte etwas erzählen.';
$bavarian = $translator->translate($text);

echo $bavarian; // i ham hoid an guadn Tog und wui ebba sogn
```

## Features

- Word-level replacements (e.g. `ich` → `i`, `wir` → `mia`)
- Suffix transformations (e.g. `-lich` → `-le`, `-chen` → `-al`)
- Prefix transformations (e.g. `ge-` → `g'`, `ver-` → `fa`)
- Context-insensitive global replacements (e.g. `nicht` → `ned`)

## Configuration

You can adjust or extend the replacement rules by modifying the following constants in the `Translator` class:

- `SUB_REPLACEMENTS_GLOBAL`
- `SUB_REPLACEMENTS_START`
- `SUB_REPLACEMENTS_ENDINGS`
- `REPLACEMENTS_ENTIRE_WORDS`

These arrays define how parts of words or whole words should be transformed during translation.

