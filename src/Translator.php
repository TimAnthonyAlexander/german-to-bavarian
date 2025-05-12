<?php

declare(strict_types=1);

namespace TimAlexander\Bavarian;

final class Translator
{
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
        'er' => 'a',
        'en' => 'n',
        'em' => 'm',
    ];

    public const array SUB_REPLACEMENTS_START = [
        'ge' => 'g\'',
        'ver' => 'fa',
        'zer' => 'za',
        'be' => 'b\'',
        'emp' => 'empf',
        'ent' => 'ent',
        'er' => 'ea',
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
        'will' => 'wui',
        'müssen' => 'miassn',
        'sagen' => 'sogn',
        'machen' => 'macha',
        'gehen' => 'geh',
        'kommen' => 'kimm',
        'sehen' => 'sehn',
        'kann' => 'ko',
        'können' => 'kenna',
        'danke' => 'dangge',
        'bitte' => 'biddschee',
        'viel' => 'vui',
        'hier' => 'do',
        'dort' => 'drent',
        'oben' => 'om',
        'unten' => 'untn',
        'links' => 'links',
        'rechts' => 'rechts',
        'schön' => 'schee',
        'groß' => 'groaß',
        'klein' => 'kloa',
        'essen' => 'essn',
        'trinken' => 'dringa',
        'nicht' => 'ned',
        'ein' => 'oa',
        'eine' => 'oane',
        'kein' => 'koan',
        'keine' => 'koane',
        'auch' => 'a',
        'gut' => 'guad',
        'jetzt' => 'jetzat',
        'rauchen' => 'raucha',
        'laufen' => 'laffa',
        'fahren' => 'fahrn',
        'denken' => 'denka',
        'hallo' => 'servus',
        'tschüss' => 'pfiat di',
        'guten' => 'guadn',
        'morgen' => 'morgn',
        'tag' => 'toag',
    ];

    public function translate(string $text): string
    {
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
