<?php

declare(strict_types=1);

namespace TimAlexander\Bavarian;

final class Translator
{
    public const array SUB_REPLACEMENTS_ENDINGS = [
        'chen'  => 'l',
        'lein'  => 'l',
        'lich'  => 'li',
        'ung'   => 'ung',
        'ig'    => 'ig',
        'iert'  => 'iad',
        'iel'   => 'ü',
        'ag'    => 'og',
        'e'     => 'a',
        'er'    => 'a',
        'en'    => 'n',
        'em'    => 'm',
        'bar'   => 'boa',
        'los'   => 'los',
        'heit'  => 'heid',
        'keit'  => 'keid',
        'isch'  => 'isch',
    ];

    public const array SUB_REPLACEMENTS_START = [
        'ver'   => 'va',
        'ge'    => '',
        'emp'   => 'empf',
        'ent'   => 'ent',
        'er'    => 'ea',
        'zer'   => 'za',
        'be'    => 'b\'',
        'aus'   => 'aus',
        'auf'   => 'auf',
        'nach'  => 'noch',
        'ein'   => 'nei',
        'unter' => 'unta',
        'über'  => 'iba',
        'vor'   => 'voa',
    ];

    public const array REPLACEMENTS_ENTIRE_WORDS = [
        'ich'       => 'i',
        'mich'      => 'mi',
        'mir'       => 'ma',
        'du'        => 'du',
        'dich'      => 'di',
        'dir'       => 'dir',
        'wir'       => 'mia',
        'uns'       => 'uns',
        'ihr'       => 'eich',
        'euch'      => 'eich',
        'er'        => 'er',
        'sie'       => 'sia',
        'es'        => '\'s',
        'hallo'     => 'servus',
        'tschüss'   => 'pfiat di',
        'grüß'      => 'griaß',
        'eins'      => 'oans',
        'zwei'      => 'zwoa',
        'drei'      => 'drei',
        'vier'      => 'via',
        'fünf'      => 'fimf',
        'sechs'     => 'sechz',
        'sieben'    => 'siem',
        'acht'      => 'ocht',
        'neun'      => 'nei',
        'zehn'      => 'zehn',

        'haben'     => 'ham',
        'hat'       => 'hot',
        'ist'       => 'is',
        'war'       => 'woar',
        'werden'    => 'wern',
        'wird'      => 'wiad',
        'will'      => 'wui',
        'wollen'    => 'woin',
        'müssen'    => 'miassn',
        'machen'    => 'mocha',
        'gehen'     => 'géh',
        'kommen'    => 'kimm',
        'sehen'     => 'sehn',
        'kann'      => 'ko',
        'können'    => 'kenna',
        'essen'     => 'essn',
        'trinken'   => 'dringa',
        'sprechen'  => 'redn',
        'laufen'    => 'laffa',
        'fahren'    => 'fahrn',
        'denken'    => 'denka',
        'geben'     => 'gem',
        'nehmen'    => 'nemma',
        'schlafen'  => 'schloffa',
        'bleiben'   => 'bleim',
        'bringen'   => 'bringa',
        'wissen'    => 'wissn',

        'und'       => 'und',
        'oder'      => 'oda',
        'aber'      => 'oba',
        'auch'      => 'a',
        'nicht'     => 'ned',
        'ein'       => 'oa',
        'eine'      => 'oane',
        'kein'      => 'koan',
        'keine'     => 'koane',
        'hier'      => 'do',
        'dort'      => 'drent',
        'was'       => 'wos',
        'oben'      => 'om',
        'unten'     => 'untn',
        'gut'       => 'guad',
        'schön'     => 'schee',
        'groß'      => 'groaß',
        'klein'     => 'kloa',
        'jetzt'     => 'jetz',
        'morgen'    => 'morgn',
        'gestern'   => 'gestan',
        'heute'     => 'heut',
        'immer'     => 'ollawei',
        'nie'       => 'nia',
        'oft'       => 'oft',
        'vielleicht' => 'viaraicht',
        'wirklich'  => 'wiakli',
        'wichtig'   => 'wichti',

        'guten'     => 'guadn',
        'abend'     => 'omd',
        'tag'       => 'toag',
        'bitte'     => 'bittscheen',
        'danke'     => 'dankschee',
        'entschuldigung' => 'tschuidign',
        'viele'     => 'viui',
        'wenige'    => 'weng',
        'mehr'      => 'mea',
        'weniger'   => 'weniga',

        'jahr'      => 'joa',
        'jahre'     => 'joa',
        'mann'      => 'mo',
        'frau'      => 'frau',
        'kind'      => 'kindl',
        'leute'     => 'leit',
        'freund'    => 'spezl',
        'freunde'   => 'spezln',
        'haus'      => 'hois',
        'alter'     => 'oida',
        'münchen'   => 'minga',
        'stadt'     => 'stodt',
        'deshalb'   => 'deshoib',
        'radler'    => 'limo',
        'auto'      => 'wagerl',
        'bus'       => 'bussl',
        'tim'       => 'tim (der beste)',
        'jan'       => 'jan (der kek)',
        'feli'      => 'feli goober',
        'geld'      => 'goid',
        'bier'      => 'bia',
        'wein'      => 'woin',
        'sind'      => 'san',
        'wasser'    => 'wossa',
        'brot'      => 'brot',
        'ja'        => 'jo',
        'nein'      => 'na',
        'weil'      => 'wei',
        'wenn'      => 'wenn',
        'dass'      => 'dass',
        'nur'       => 'bloß',
        'schon'     => 'scho',
        'doch'      => 'doch',
        'genau'     => 'genau',
        'langsam'   => 'longsam',
        'schnell'   => 'schnai',
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
