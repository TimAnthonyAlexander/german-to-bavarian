<?php

declare(strict_types=1);

namespace TimAlexander\Bavarian;

final class Translator
{
    public const array SUB_REPLACEMENTS_GLOBAL = [
        'nicht' => 'ned',
        'ein' => 'a',
        'eine' => 'a',
        'und' => 'und',
        'auch' => 'a',
        'gut' => 'guad',
    ];

    public const array SUB_REPLACEMENTS_ENDINGS = [
        'chen' => 'al',
        'lein' => 'al',
        'lich' => 'le',
        'ung' => 'ung',
        'ig' => 'ig',
        'iert' => 'iad',
        'iel' => 'ui',
        'ag' => 'og',
        'e' => 'a',
    ];

    public const array SUB_REPLACEMENTS_START = [
        'ge' => 'g\'',
        'ver' => 'fa',
        'zer' => 'za',
        'be' => 'b\'',
    ];

    public const array REPLACEMENTS_ENTIRE_WORDS = [
        'ich' => 'i',
        'du' => 'du',
        'er' => 'er',
        'sie' => 'si',
        'es' => '\'s',
        'wir' => 'mia',
        'ihr' => 'es',
        'haben' => 'ham',
        'hat' => 'hot',
        'ist' => 'is',
        'das' => 'des',
        'der' => 'da',
        'die' => 'd\'',
        'was' => 'wos',
        'warum' => 'warum',
        'ja' => 'jo',
        'nein' => 'na',
        'nicht' => 'ned',
        'will' => 'wui',
    ];

    public function translate(string $text): string
    {
        // Global replacements
        $text = str_ireplace(
            array_keys(self::SUB_REPLACEMENTS_GLOBAL),
            array_values(self::SUB_REPLACEMENTS_GLOBAL),
            $text
        );

        $words = preg_split('/\b/u', $text, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($words as $key => $word) {
            $originalWord = $word;

            // Replace entire words first (case-insensitive)
            $lowerWord = strtolower($word);
            if (isset(self::REPLACEMENTS_ENTIRE_WORDS[$lowerWord])) {
                $word = self::REPLACEMENTS_ENTIRE_WORDS[$lowerWord];
                $words[$key] = $this->matchCase($originalWord, $word);
                continue;
            }

            // Replace word starts
            foreach (self::SUB_REPLACEMENTS_START as $start => $replaceStart) {
                if (stripos($word, $start) === 0) {
                    $word = preg_replace('/^' . preg_quote($start, '/') . '/i', $replaceStart, $word);
                    break;
                }
            }

            // Replace word endings
            foreach (self::SUB_REPLACEMENTS_ENDINGS as $ending => $replaceEnd) {
                if (preg_match('/' . preg_quote($ending, '/') . '$/i', $word)) {
                    $word = preg_replace('/' . preg_quote($ending, '/') . '$/i', $replaceEnd, $word);
                    break;
                }
            }

            $words[$key] = $this->matchCase($originalWord, $word);
        }

        return implode('', $words);
    }

    private function matchCase(string $original, string $replacement): string
    {
        if (mb_strtoupper($original, 'UTF-8') === $original) {
            return mb_strtoupper($replacement, 'UTF-8');
        }

        if (mb_strtolower($original, 'UTF-8') === $original) {
            return mb_strtolower($replacement, 'UTF-8');
        }

        return mb_convert_case($replacement, MB_CASE_TITLE, 'UTF-8');
    }
}
