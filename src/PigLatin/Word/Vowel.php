<?php

namespace VitKutny\PigLatin\Word;

final class Vowel {

    private static $letters = [
        'a', 'e', 'i', 'o', 'u'
    ];

    public static function begins($word) {
        $word = strtolower($word);
        $letter = $word[0];
        if ($letter == 'y') {
            return !in_array(substr($word, 1, 1), self::$letters);
        }
        return in_array($letter, self::$letters);
    }

}
